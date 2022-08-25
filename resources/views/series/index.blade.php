<x-layout title="Series" :success-message="$successMessage">
<a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Add new serie</a>
<ul class="list-group">
	@foreach($series as $serie)
		<li class="list-group-item d-flex justify-content-between align-itens-center">
		<a href=" {{ route('seasons.index', $serie->id) }}">
			{{ $serie->name	}}
		</a>

            <span class="d-flex">
                <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('series.destroy', $serie->id) }}" class="ms-2" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm ">
                        X
                    </button>
                </form>
            </span>
		</li>
	@endforeach
</ul>
</x-layout>
