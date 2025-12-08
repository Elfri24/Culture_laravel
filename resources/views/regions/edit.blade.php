@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Modifier la région</h1>

    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('regions.update', $region->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nom de la région</label>
                <input type="text" name="nom" required
                       value="{{ $region->nom }}"
                       class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Code (optionnel)</label>
                <input type="text" name="code"
                       value="{{ $region->code }}"
                       class="w-full border rounded-lg px-3 py-2">
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Mettre à jour
            </button>
        </form>

    </div>
</div>
@endsection
