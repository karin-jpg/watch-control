<x-layout title="Series">
    <a href="/series/create">Add new serie</a>
<ul>
    @foreach($series as $serie)
        <li>{{ $serie }}</li>
    @endforeach
</ul>
</x-layout>
