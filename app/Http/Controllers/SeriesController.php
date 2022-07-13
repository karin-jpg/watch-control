<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = [
            'Daredevil',
            'Stranger Things',
            'The Good Doctor'
        ];

        return view('list-series')->with('series', $series);
    }
}
