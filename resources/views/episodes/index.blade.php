<x-layout title="Episodes">
<a href="{{ route('seasons.index', $series->id) }}" class="btn btn-dark mb-2">Seasons of {{$series->name}}</a>
<form method="post">
	@csrf
	<ul class="list-group">
		@foreach($episodes as $episode)
			<li class="list-group-item d-flex justify-content-between align-itens-center">
					Episode {{ $episode->number }}
					<input type="checkbox" name="episodes[]" value="{{ $episode->id }}">
			</li>
		@endforeach
	</ul>
	<button class="btn btn-primary mt-2 mb-2">Save</button>
</form>
</x-layout>
