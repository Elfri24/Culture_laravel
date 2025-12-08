@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <h1 class="text-2xl font-bold mb-6">Détails du type de contenu</h1>

    <div class="bg-white shadow rounded-lg p-6">

        <p class="mb-3"><strong>ID :</strong> {{ $type_contenu->id }}</p>
        <p class="mb-3"><strong>Nom :</strong> {{ $type_contenu->nom }}</p>
        <p class="mb-3"><strong>Description :</strong> {{ $type_contenu->description }}</p>

        <div class="mt-6">
            <a href="{{ route('typeContenu.index') }}" class="text-gray-700 underline">Retour</a>
        </div>

    </div>

</div>
@endsection
