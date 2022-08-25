<?php

namespace App\Repositories\Episode;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentEpisodeRepository implements EpisodeRepository
{
	public function update(Request $request, Season $season): void
	{
		DB::transaction(function () use ($request, $season) {
			$watchedEpisodes = $request->episodes;

			if(!$watchedEpisodes) {
				Episode::where('season_id', $season->id)
				->update(['watched' => 0]);

				return;
			}

			Episode::whereIn('id', $watchedEpisodes)
				->where('season_id', $season->id)
				->update(['watched' => 1]);

			Episode::whereNotIn('id', $watchedEpisodes)
				->where('season_id', $season->id)
				->update(['watched' => 0]);

			return;
		});

	}
}
