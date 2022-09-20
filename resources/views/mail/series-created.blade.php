@component('mail::message')

# A new series has been added!

{{$seriesName}} with {{$seasonsCount}} seasons and {{$episodesCount}} episodes has been created

You can see it right here:

@component('mail::button', ['url' => route('seasons.index', $seriesId)])
	See more
@endcomponent

@endcomponent
