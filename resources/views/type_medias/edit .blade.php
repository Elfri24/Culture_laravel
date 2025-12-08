@extends('layout')

@section('content')
<div class="container py-6">
    <h1 class="text-2xl font-bold mb-6">Modifier le Type de Média</h1>

    <form action="{{ route('typeMedia.update', $type_media->id) }}" method="POST" class="bg-white shadow-md rounded p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="font-semibold">Nom du Type de Média</label>
            <input type="text" name="nom" value="{{ $type_media->nom }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">
            Mettre à jour
        </button>
    </form>
</div>
@endsection
