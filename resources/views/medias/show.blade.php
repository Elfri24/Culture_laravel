@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Détails du média</h1>

    <div class="bg-white shadow rounded-lg p-6">

        <p class="mb-3"><strong>ID :</strong> {{ $media->id }}</p>

        <p class="mb-3"><strong>Type :</strong> {{ $media->type }}</p>

        <p class="mb-3"><strong>Taille :</strong> {{ $media->taille }} Ko</p>

        <p class="mb-3"><strong>Chemin :</strong> {{ $media->chemin }}</p>

        <div class="mt-6">
            @if(Str::contains($media->type, ['jpg', 'jpeg', 'png']))
                <img src="{{ asset($media->chemin) }}" class="w-80 rounded-lg shadow">
            @else
                <a href="{{ asset($media->chemin) }}" target="_blank" class="text-indigo-700 underline">
                    Télécharger / Voir le fichier
                </a>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('media.index') }}" class="text-gray-700 underline">Retour</a>
        </div>
    </div>
</div>
@endsection
