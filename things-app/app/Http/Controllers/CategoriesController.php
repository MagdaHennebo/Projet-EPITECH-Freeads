<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;
use \Illuminate\Http\UploadedFile;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();

        return view('index_cat', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_cat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',

            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $validatedData = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'picture/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData['picture'] = "$profileImage";
        }


        Categories::create($validatedData);

        return redirect('/Categories')->with('success', 'category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::findOrFail($id);

        return view('edit_cat', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $validatedData = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'picture/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData['picture'] = "$profileImage";
        } else {
            unset($validatedData['picture']);
        }

        $categories->update($validatedData);

        return redirect('/Categories')->with('success', 'category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return redirect('/Categories')->with('success', 'category deleted successfully');
    }
}
