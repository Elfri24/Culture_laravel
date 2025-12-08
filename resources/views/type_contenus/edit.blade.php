@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto py-10">

    <h1 class="text-2xl font-bold mb-6">Modifier le type de contenu</h1>

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('typeContenu.update', $type_contenu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nom du type</label>
                <input type="text" name="nom" value="{{ $type_contenu->nom }}" required
                       class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Description</label>
                <textarea name="description" class="w-full border rounded-lg px-3 py-2" rows="3">
                    {{ $type_contenu->description }}
                </textarea>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Mettre à jour
            </button>
        </form>

    </div>
</div>
@endsection
