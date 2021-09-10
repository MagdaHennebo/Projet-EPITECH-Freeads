<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Categories;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function indexHome()
    {
        $catalogues = Catalogue::all();
        $categories = Categories::all();


        // Return the search view with the resluts compacted
        return view('home', compact('catalogues', 'categories'))
            ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    public function show($id)
    {
        $id = Catalogue::whereId('$id')->firstOrFail();
        return View::make('id.show', compact('catalogues'));
    }
}
