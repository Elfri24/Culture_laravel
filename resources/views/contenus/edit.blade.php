@extends('layout')

@section('content')
<h1>Modifier un contenu</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('contenus.update', $contenu) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre', $contenu->titre) }}" required>
    </div>

    <div class="mb-3">
        <label for="texte" class="form-label">Texte</label>
        <textarea id="texte" name="texte" rows="5" class="form-control" required>{{ old('texte', $contenu->texte) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="date_creation" class="form-label">Date de création</label>
        <input type="date" id="date_creation" name="date_creation" class="form-control" value="{{ old('date_creation', $contenu->date_creation ? $contenu->date_creation->format('Y-m-d') : '') }}">
    </div>

    <div class="mb-3">
        <label for="statut" class="form-label">Statut</label>
        <input type="text" id="statut" name="statut" class="form-control" value="{{ old('statut', $contenu->statut) }}">
    </div>

    <div class="mb-3">
        <label for="parent_id" class="form-label">Parent</label>
        <select id="parent_id" name="parent_id" class="form-select">
            <option value="">-- Aucun parent --</option>
            @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" {{ old('parent_id', $contenu->parent_id) == $parent->id ? 'selected' : '' }}>
                    {{ $parent->titre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="date_validation" class="form-label">Date de validation</label>
        <input type="date" id="date_validation" name="date_validation" class="form-control" value="{{ old('date_validation', $contenu->date_validation ? $contenu->date_validation->format('Y-m-d') : '') }}">
    </div>

    <div class="mb-3">
        <label for="region_id" class="form-label">Région</label>
        <select id="region_id" name="region_id" class="form-select" required>
            <option value="">-- Choisir une région --</option>
            @foreach ($regions as $region)
                <option value="{{ $region->id }}" {{ old('region_id', $contenu->region_id) ==
