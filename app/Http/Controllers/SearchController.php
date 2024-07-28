<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('searchField');

        // Simple search logic - you can use more advanced algorithms as needed
        $items = Item::where('name', 'LIKE', "%{$query}%")->get();

        return view('search_results', ['items' => $items]);
    }
}
