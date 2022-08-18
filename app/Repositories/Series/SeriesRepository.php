<?php

namespace App\Repositories\Series;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

interface SeriesRepository
{
	public function add(SeriesFormRequest $series): Series;
}
