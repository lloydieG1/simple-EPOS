<?php

namespace App\Http\Controllers;

use App\Models\Agreement;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $agreements = Agreement::query()
            ->where('id', $query)
            ->orWhere('customer_forename', 'like', "%{$query}%")
            ->orWhere('customer_surname', 'like', "%{$query}%")
            ->get();

        return view('search.results', compact('agreements', 'query'));
    }
}
