<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Add new serie</a>
<ul class="list-group">
    @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-itens-center">
            {{ $serie->name }}
        <form action="{{ route('series.destroy', $serie->id) }}" method="post">
            @csrf
            <button class="btn btn-danger btn-sm">
                X
            </button>
        </form>
        </li>
    @endforeach
</ul>
</x-layout>
