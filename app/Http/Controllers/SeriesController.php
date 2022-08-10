<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
	public function index()
	{
		$series = Series::all();
		$successMessage = session('message.success');
		return view('series.index')->with('series', $series)->with('successMessage', $successMessage);
	}

	public function create()
	{
		return view('series.create');
	}

	public function store(SeriesFormRequest $request)
	{
		try{
			DB::beginTransaction();

			$series = Series::create($request->all());
			$seasons =[];

			for($currentSeason = 1; $currentSeason <= $request->seasons; $currentSeason++){
				$seasons[] = [
					"series_id" => $series->id,
					"number" => $currentSeason
				];
			}
			Season::insert($seasons);

			$episodes = [];
			foreach ($series->seasons as $season) {
				for($currentEpisode = 1; $currentEpisode <= $request->episodes; $currentEpisode++){
					$episodes[] = [
						"season_id" => $season->id,
						"number" => $currentEpisode
					];
				}
			}

			Episode::insert($episodes);
			DB::commit();

			return to_route('series.index')
			->with('message.success', "Series '$series->name' added successfully!");

		} catch(\Illuminate\Database\QueryException) {

			DB::rollBack();
			return to_route('series.index')->withErrors(["queryException" => "An error occurred while trying to add a series!"]);
		} catch(\Exception) {

			DB::rollBack();
			return to_route('series.index')->withErrors(["exception" => "An error occurred on the system!"]);
		}

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
