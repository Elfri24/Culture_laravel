@extends('layout')

@section('content')
<div class="container py-6">
    <h1 class="text-2xl font-bold mb-4">Détails du Type de Média</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID :</strong> {{ $type_media->id }}</p>
        <p class="mt-2"><strong>Nom :</strong> {{ $type_media->nom }}</p>
        <p class="mt-2"><strong>Créé le :</strong> {{ $type_media->created_at }}</p>

        <a href="{{ route('typeMedia.index') }}" class="mt-4 inline-block text-blue-600">Retour</a>
    </div>
</div>
@endsection
