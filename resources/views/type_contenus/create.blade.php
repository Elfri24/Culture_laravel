@extends('layout')

@section('title')
<h3>Ajouter un type de contenu</h3>
@endsection

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="card-title">Nouveau type de contenu</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('typeContenu.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="nom_contenu">Nom du type</label>
                    <input type="text" name="nom_contenu" id="nom_contenu" 
                           value="{{ old('nom_contenu') }}" 
                           class="form-control @error('nom_contenu') is-invalid @enderror" 
                           placeholder="Ex: Article" required>
                    @error('nom_contenu')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Description du type de contenu">{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('typeContenu.index') }}" class="btn btn-secondary ms-2">Annuler</a>

        </form>

    </div>
</div>

@endsection
