<x-layout title="New serie">
    <x-series.form :action="route('series.store')" :name="old('name')" :update="false" />
</x-layout>
