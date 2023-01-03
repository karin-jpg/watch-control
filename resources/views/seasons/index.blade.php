<x-layout title="Seasons of {!! $series->name !!}">
	<div class="text-center">
		<img src=" {{ asset('storage/' . $series->cover) }} " alt="Series cover" style="height: 400px" class="img-fluid">
	</div>
	<a href="{{ route('series.index') }}" class="btn btn-dark mb-2">Series</a>
<ul class="list-group">
	@foreach($seasons as $season)
		<li class="list-group-item d-flex justify-content-between align-itens-center">
			<a href="{{ route('episodes.index', $season->id)}}">
				Season {{ $season->number }}
			</a>
			<span class="badge bg-secondary">
				{{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
			</span>
		</li>
	@endforeach
</ul>
</x-layout>
