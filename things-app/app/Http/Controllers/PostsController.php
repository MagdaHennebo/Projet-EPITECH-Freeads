<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $catalogues = Catalogue::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('search', compact('catalogues'));
    }
}
