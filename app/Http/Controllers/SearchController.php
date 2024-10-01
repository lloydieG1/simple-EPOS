<?php

namespace App\Http\Controllers;

use App\Models\Agreement;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // get user input
        $query = $request->input('query');

        $agreements = Agreement::query()
            // matches id
            ->where('id', $query)
            // matches customer forename
            ->orWhere('customer_forename', 'like', "%{$query}%")
            // matches customer surname
            ->orWhere('customer_surname', 'like', "%{$query}%")
            ->get();

        return view('search.results', compact('agreements', 'query'));
    }
}
