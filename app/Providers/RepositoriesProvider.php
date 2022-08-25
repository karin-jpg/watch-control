<?php

namespace App\Providers;

use App\Repositories\Series\SeriesRepository;
use App\Repositories\Series\EloquentSeriesRepository;

use App\Repositories\Episode\EpisodeRepository;
use App\Repositories\Episode\EloquentEpisodeRepository;

use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
	public array $bindings = [
		SeriesRepository::class => EloquentSeriesRepository::class,
		EpisodeRepository::class => EloquentEpisodeRepository::class
	];
}
