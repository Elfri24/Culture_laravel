@extends('layout')

@section('content')
    <h1 class="mb-4">Créer un contenu</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contenus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Titre --}}
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre') }}" required>
        </div>

        {{-- Texte --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="5" class="form-control" required>{{ old('texte') }}</textarea>
        </div>

        {{-- Date création --}}
        <div class="mb-3">
            <label class="form-label">Date de création</label>
            <input type="date" name="date_creation" class="form-control" value="{{ old('date_creation') }}">
        </div>

        {{-- Statut --}}
        <div class="mb-3">
            <label class="form-label">Statut</label>
            <input type="text" name="statut" class="form-control" value="{{ old('statut') }}">
        </div>

        {{-- Date validation --}}
        <div class="mb-3">
            <label class="form-label">Date de validation</label>
            <input type="date" name="date_validation" class="form-control" value="{{ old('date_validation') }}">
        </div>

        {{-- Région --}}
        <div class="mb-3">
            <label class="form-label">Région</label>
            <select name="region_id" class="form-select" required>
                <option value="">-- Choisir une région --</option>
                @foreach ($regions as $region)
                    <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                        {{ $region->nom_region }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Langue --}}
        <div class="mb-3">
            <label class="form-label">Langue</label>
            <select name="langue_id" class="form-select" required>
                <option value="">-- Choisir une langue --</option>
                @foreach ($langues as $langue)
                    <option value="{{ $langue->id }}" {{ old('langue_id') == $langue->id ? 'selected' : '' }}>
                        {{ $langue->nom_langue }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Auteur --}}
        <div class="mb-3">
            <label class="form-label">Auteur</label>
            <select name="auteur_id" class="form-select" required>
                <option value="">-- Choisir un auteur --</option>
                @foreach ($utilisateurs as $utilisateur)
                    <option value="{{ $utilisateur->id }}" {{ old('auteur_id') == $utilisateur->id ? 'selected' : '' }}>
                        {{ $utilisateur->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Modérateur --}}
        <div class="mb-3">
            <label class="form-label">Modérateur</label>
            <select name="moderateur_id" class="form-select">
                <option value="">-- Aucun modérateur --</option>
                @foreach ($utilisateurs as $utilisateur)
                    <option value="{{ $utilisateur->id }}"
                        {{ old('moderateur_id') == $utilisateur->id ? 'selected' : '' }}>
                        {{ $utilisateur->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Upload média --}}
        <div class="mb-3">
            <label class="form-label">Média (image ou fichier)</label>
            <input type="file" name="media" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('contenus.index') }}" class="btn btn-secondary">Annuler</a>

    </form>
@endsection
