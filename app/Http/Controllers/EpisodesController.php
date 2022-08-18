<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Repositories\Episode\EpisodeRepository;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
	public function __construct(private EpisodeRepository $repository)
	{

	}

    public function index(Season $season)
	{
		$successMessage = session('message.success');
		return view('episodes.index')
			->with('episodes', $season->episodes)
			->with('series', $season->series)
			->with('successMessage', $successMessage);
	}

	public function update(Request $request, Season $season)
	{
		$this->repository->update($request, $season);

		return to_route('episodes.index', $season)
			->with('message.success', 'Episodes updated with sucess!');
	}
}
