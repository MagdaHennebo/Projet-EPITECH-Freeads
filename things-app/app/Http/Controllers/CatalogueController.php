<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        if (Auth::user()->admin == 0) {

            $input['user_id'] = Auth::user()->id;
            $user = $input['user_id'];



            $catalogues = Catalogue::where('user_id', '=', "$user")->latest()->paginate(5);

            return view('catalogues.index', compact('catalogues'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $catalogues = Catalogue::latest()->paginate(5);

            return view('catalogues.index', compact('catalogues'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'category' => 'required',
            'location' => 'required',


        ]);


        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Catalogue::create($input);

        return redirect()->route('catalogues.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogue $catalogue)
    {
        return view('catalogues.show', compact('catalogue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        return view('catalogues.edit', compact('catalogue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogue $catalogue)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'category' => 'required',
            'location' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $catalogue->update($input);

        return redirect()->route('catalogues.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogue $catalogue)
    {
        $catalogue->delete();

        return redirect()->route('catalogues.index')
            ->with('success', 'Product deleted successfully');
    }
}
