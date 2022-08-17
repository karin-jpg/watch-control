<x-layout title="Episodes">
<div class="d-flex justify-content-between"">
	<a href="{{ route('seasons.index', $series->id) }}" class="btn btn-dark mb-2">Seasons of {{$series->name}}</a>
	<button class="btn btn-dark mb-2" id="checkButton" onclick="checkUncheckAllEpisodes()"></button>
</div>
<form method="post">
	@csrf
	<ul class="list-group">
		<input type="hidden" id="allChecked" value="true">
		@foreach($episodes as $episode)
			<li class="list-group-item d-flex justify-content-between align-itens-center">
			 	Episode {{ $episode->number }}
				<input type="checkbox" class="checkbox" name="episodes[]" value="{{ $episode->id }}" @if($episode->watched) checked @endif />
			</li>
		@endforeach
	</ul>
	<button class="btn btn-primary mt-2 mb-2">Save</button>
</form>
<script rel="stylesheet" src=" {{ asset('js/episodes/episodes.js') }} "></script>
</x-layout>
