@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Ajouter un Type de Média</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('typeMedia.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nom" class="block mb-1 font-semibold">Nom du type de média</label>
                <input type="text" id="nom" name="nom" required
                       class="w-full border rounded-lg px-3 py-2 @error('nom') border-red-500 @enderror"
                       placeholder="Ex: Image, Vidéo, Document..."
                       value="{{ old('nom') }}">
                @error('nom')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Enregistrer
            </button>
            <a href="{{ route('typeMedia.index') }}" class="ml-4 text-gray-600 hover:underline">Annuler</a>
        </form>
    </div>
</div>
@endsection
