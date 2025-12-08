@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Modifier le média</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('media.update', $media->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Type de média</label>
                <select name="type_media_id" class="w-full border rounded-lg px-3 py-2">
                    @foreach($typeMedias as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $media->type_media_id ? 'selected' : '' }}>
                            {{ $type->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Contenu associé</label>
                <select name="contenu_id" class="w-full border rounded-lg px-3 py-2">
                    @foreach($contenus as $contenu)
                        <option value="{{ $contenu->id }}" {{ $contenu->id == $media->contenu_id ? 'selected' : '' }}>
                            {{ $contenu->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Mettre à jour
            </button>
        </form>
    </div>
</div>
@endsection
