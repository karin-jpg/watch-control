<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
	public function index(Request $request)
	{

		$series = Series::query()->orderBy('name')->get();
        $successMessage = session('message.success');
		return view('series.index')->with('series', $series)->with('successMessage', $successMessage);
	}

	public function create()
	{
		return view('series.create');
	}

	public function store(Request $request)
	{
		$series = Series::create($request->all());
        $request->session()->flash('message.success', "$series->name added successfully!");

		return to_route('series.index');

	}

	public function destroy(Series $series, Request $request)
	{
		$series->delete();
        $request->session()->flash('message.success', "Series '$series->name' removed successfully!");

        return to_route('series.index');
	}
}
