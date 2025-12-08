@extends('layout')

@section('title')
    Ajouter une région
@endsection

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="card-title">Ajouter une région</h4>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('region.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="nom_region" class="form-label">Nom de la région</label>
                    <input type="text" name="nom_region" id="nom_region" class="form-control"
                           value="{{ old('nom_region') }}" required placeholder="Ex: Atlantique">
                    @error('nom_region') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="population" class="form-label">Population (optionnel)</label>
                    <input type="number" name="population" id="population" class="form-control"
                           value="{{ old('population') }}" placeholder="Ex: 1500000">
                    @error('population') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="superficie" class="form-label">Superficie (km²) (optionnel)</label>
                    <input type="number" name="superficie" id="superficie" class="form-control"
                           value="{{ old('superficie') }}" placeholder="Ex: 6432">
                    @error('superficie') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="localisation" class="form-label">Localisation (optionnel)</label>
                    <input type="text" name="localisation" id="localisation" class="form-control"
                           value="{{ old('localisation') }}" placeholder="Ex: Sud-Ouest du pays">
                    @error('localisation') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="description" class="form-label">Description (optionnel)</label>
                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Brève description de la région">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('region.index') }}" class="btn btn-secondary ms-2">Annuler</a>

        </form>

    </div>
</div>

@endsection
