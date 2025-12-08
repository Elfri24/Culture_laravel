@extends('layout')

@section('title')
<h3>Ajouter un utilisateur</h3>
@endsection

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="card-title">Nouvel utilisateur</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('utilisateurs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="form-control">
                    @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" class="form-control">
                    @error('prenom') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="form-control">
                    @error('mot_de_passe') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Sexe</label>
                    <select name="sexe" class="form-select">
                        <option value="">Choisir...</option>
                        <option value="M" {{ old('sexe')=='M' ? 'selected' : '' }}>Masculin</option>
                        <option value="F" {{ old('sexe')=='F' ? 'selected' : '' }}>Féminin</option>
                    </select>
                    @error('sexe') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Date de naissance</label>
                    <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}">
                    @error('date_naissance') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Rôle</label>
                    <select name="role_id" class="form-select">
                        <option value="">Choisir...</option>
                        @foreach($roles as $r)
                        <option value="{{ $r->id }}">{{ $r->nom_role }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Langue</label>
                    <select name="langue_id" class="form-select">
                        <option value="">Choisir...</option>
                        @foreach($langues as $l)
                        <option value="{{ $l->id }}">{{ $l->nom_langue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary">Annuler</a>

        </form>

    </div>
</div>

@endsection
