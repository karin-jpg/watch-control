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
		Series::create($request->all());
        $request->session()->flash('message.success', 'Series added successfully!');
		return to_route('series.index');

	}

	public function destroy(Request $request)
	{
		Series::destroy($request->id);
        $request->session()->flash('message.success', 'Series removed successfully!');
		return to_route('series.index');
	}
}
