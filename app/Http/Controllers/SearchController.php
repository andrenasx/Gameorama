<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        if ($request->has("query")){
            return view('pages.search', ['query' => $request->input("query")]);;
        }
    }
}
