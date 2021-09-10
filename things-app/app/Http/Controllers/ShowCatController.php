<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;

use Illuminate\Http\Request;

class ShowCatController extends Controller
{
    public function show()
    {
        $catal = Catalogue::where('category', '=', 'category->name');
        return view('/{category->name}', compact('catalogues'));
    }
}
