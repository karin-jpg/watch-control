@component('mail::message')

# A new series has been added!

{{$seriesName}} with {{$seasonsCount}} and {{$episodesCount}} has been created

You can see it right here:

@component('mail::button', ['url' => route('seasons.index', $seriesId)])
	See more
@endcomponent

@endcomponent
