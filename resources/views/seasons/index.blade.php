<x-layout title="Seasons of {!! $series->name !!}">
<a href="{{ route('series.index') }}" class="btn btn-dark mb-2">Series</a>
<ul class="list-group">
	@foreach($seasons as $season)
		<li class="list-group-item d-flex justify-content-between align-itens-center">
			Season {{ $season->number }}


			<span class="badge bg-secondary">
				{{ $season->episodes->count() }}
			</span>
		</li>
	@endforeach
</ul>
</x-layout>
