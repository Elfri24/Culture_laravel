@extends('layout')

@section('title')
<h3>Modifier une langue</h3>
@endsection

@section('content')

<div class="card p-4 shadow-sm">

    <form method="POST" action="{{ route('langues.update', $langue->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nom de la langue</label>
            <input type="text" name="nom_langue" class="form-control" 
                   value="{{ old('nom_langue', $langue->nom_langue) }}" required>
            @error('nom_langue')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-warning">Mettre à jour</button>
        <a href="{{ route('langues.index') }}" class="btn btn-secondary">Annuler</a>

    </form>

</div>

@endsection
