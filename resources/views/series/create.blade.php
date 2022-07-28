<x-layout title="Add new serie">
	<form action="{{ route('series.store') }}" method="post">
		@csrf
		<div class="mb-2">
			<label for="name" class="form-label">Name</label>
			<input type="text" name="name" id="name" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Add</button>
	</form>
</x-layout>
