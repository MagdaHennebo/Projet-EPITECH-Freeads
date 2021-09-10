<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function ad_page(Catalogue $catalogue, $id)
    {
        return view('ad_page', compact('catalogue'))->with('id', $id);
    }
}
