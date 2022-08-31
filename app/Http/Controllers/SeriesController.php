<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Repositories\Series\SeriesRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

	public function __construct(private SeriesRepository $repository)
	{

	}
	public function index()
	{
		$series = Series::where('user_id', Auth::id())->get();
		$successMessage = session('message.success');
		return view('series.index')->with('series', $series)->with('successMessage', $successMessage);
	}

	public function create()
	{
		return view('series.create');
	}

	public function store(SeriesFormRequest $request)
	{
		$series = $this->repository->add($request);

		$email = New SeriesCreated(
			$series->name,
			$series->id,
			$request->seasons,
			$request->episodes
		);

		Mail::to($request->user())->send($email);

		return to_route('series.index')
		->with('message.success', "Series '$series->name' added successfully!");

	}

	public function destroy(Series $series)
	{
		$series->delete();
		return to_route('series.index')
			->with('message.success', "Series '$series->name' removed successfully!");
	}

	public function edit(Series $series)
	{
		return view('series.edit')->with('series', $series);
	}

	public function update(Series $series, SeriesFormRequest $request)
	{
		$series->fill($request->all());
		$series->save();

		return to_route('series.index')
			->with('message.success', "Series '$series->name' updated successfully!");

	}
}
