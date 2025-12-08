@extends('layout')

@section('content')
<h1>Créer un commentaire</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('commentaires.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="utilisateur_id" class="form-label">Utilisateur</label>
        <select id="utilisateur_id" name="utilisateur_id" class="form-select" required>
            <option value="">-- Choisir un utilisateur --</option>
            @foreach($utilisateurs as $utilisateur)
                <option value="{{ $utilisateur->id }}" {{ old('utilisateur_id') == $utilisateur->id ? 'selected' : '' }}>
                    {{ $utilisateur->nom }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="contenu_id" class="form-label">Contenu</label>
        <select id="contenu_id" name="contenu_id" class="form-select" required>
            <option value="">-- Choisir un contenu --</option>
            @foreach($contenus as $contenu)
                <option value="{{ $contenu->id }}" {{ old('contenu_id') == $contenu->id ? 'selected' : '' }}>
                    {{ $contenu->titre ?? 'Sans titre' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="texte" class="form-label">Texte</label>
        <textarea id="texte" name="texte" rows="4" class="form-control" required>{{ old('texte') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="note" class="form-label">Note (0-10)</label>
        <input id="note" name="note" type="number" min="0" max="10" class="form-control" value="{{ old('note') }}">
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input id="date" name="date" type="date" class="form-control" value="{{ old('date') }}">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('commentaires.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection
