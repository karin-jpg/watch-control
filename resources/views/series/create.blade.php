<x-layout title="New serie">
	<a href="{{ route('series.index') }}" class="btn btn-dark mb-2">Series</a>
	<form action="{{route('series.store')}}" method="post">
	@csrf
	<div class="row mb-3">
		<div class="col-md-8 col-xs-4">
			<label for="name" class="form-label">Name</label>
			<input autofocus type="text"
					name="name"
					id="name"
					class="form-control">
		</div>
		<div class="col-md-2 col-xs-4">
			<label for="seasons" class="form-label">Number of Seasons</label>
			<input type="text"
					name="seasons"
					id="seasons"
					class="form-control">
		</div>
		<div class="col-md-2 col-xs-4">
			<label for="episodes" class="form-label">Number of Episodes</label>
			<input type="text"
					name="episodes"
					id="episodes"
					class="form-control">
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-12">
			<label for="cover" class="form-label">Cover</label>
			<input type="file" id="cover" class="form-control" accept="image/gif, image/jpeg, image/png">
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Add</button>
</form>

</x-layout>
