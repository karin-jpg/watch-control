<x-layout title="New serie">
	<form action="{{route('series.store')}}" method="post">
	@csrf
	<div class="row mb-3">
		<div class="col-8">
			<label for="name" class="form-label">Name</label>
			<input autofocus type="text"
					name="name"
					id="name"
					class="form-control">
		</div>
		<div class="col-2">
            <label for="seasons" class="form-label">Number of Seasons</label>
            <input type="text"
                    name="seasons"
                    id="seasons"
                    class="form-control">
        </div>
		<div class="col-2">
            <label for="episodes" class="form-label">Number of Episodes</label>
            <input type="text"
                    name="episodes"
                    id="episodes"
                    class="form-control">
        </div>
	</div>
	<button type="submit" class="btn btn-primary">Add</button>
</form>

</x-layout>
