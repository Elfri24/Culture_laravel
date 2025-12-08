@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Détails de la région</h1>

    <div class="bg-white shadow rounded-lg p-6">

        <p class="mb-3"><strong>ID :</strong> {{ $region->id }}</p>
        <p class="mb-3"><strong>Nom :</strong> {{ $region->nom }}</p>
        <p class="mb-3"><strong>Code :</strong> {{ $region->code }}</p>

        <div class="mt-6">
            <a href="{{ route('regions.index') }}" class="text-gray-700 underline">Retour</a>
        </div>

    </div>
</div>
@endsection
