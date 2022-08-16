<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
	public function add(SeriesFormRequest $request): Series
	{

		return DB::transaction(function () use ($request) {
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

			return $series;
		});
	}

}
