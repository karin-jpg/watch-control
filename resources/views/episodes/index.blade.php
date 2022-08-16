<x-layout title="Episodes">
<a href="{{ route('seasons.index', $series->id) }}" class="btn btn-dark mb-2">Seasons of {{$series->name}}</a>
<ul class="list-group">
	@foreach($episodes as $episode)
		<li class="list-group-item d-flex justify-content-between align-itens-center">
				Episode {{ $episode->number }}
				<input type="checkbox">
		</li>
	@endforeach
</ul>
</x-layout>
