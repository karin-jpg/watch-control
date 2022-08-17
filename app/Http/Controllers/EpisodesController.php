<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
	{
		return view('episodes.index')->with('episodes', $season->episodes)->with('series', $season->series);
	}

	public function update(Request $request, Season $season)
	{
		$watchedEpisodes = $request->episodes;

		if(!$watchedEpisodes) {
			Episode::where('season_id', $season->id)
			->update(['watched' => 0]);

			return to_route('episodes.index', $season);
		}

		Episode::whereIn('id', $watchedEpisodes)
			->where('season_id', $season->id)
			->update(['watched' => 1]);

		Episode::whereNotIn('id', $watchedEpisodes)
			->where('season_id', $season->id)
			->update(['watched' => 0]);

		return to_route('episodes.index', $season);

	}
}
