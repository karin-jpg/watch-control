<x-layout title="Edit series '{!! $series->name !!}'">
	<form action="{{ route('series.update', $series->id) }}" method="post">
	@csrf
	@method("PUT")
	<div class="mb-2">
		<label for="name" class="form-label">Name</label>
		<input type="text"
				name="name"
				id="name"
				class="form-control"
				value="{{ $series->name }}">
	</div>
	<button type="submit" class="btn btn-primary">Add</button>
</form>

</x-layout>
