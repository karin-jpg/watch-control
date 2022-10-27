<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\Series\SeriesRepository;
use App\Models\Series;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class EmailUserAboutSeriesCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

		$email = New SeriesCreated(
			$event->seriesName,
			$event->seriesId,
			$event->seriesSeasons,
			$event->seiresEpisodes
		);

		Mail::to(Auth::user())->queue($email);

    }
}
