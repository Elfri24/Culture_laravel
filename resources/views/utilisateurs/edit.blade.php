@extends('layout')

@section('title')
<h3>Modifier utilisateur</h3>
@endsection

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="card-title">Éditer : {{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('utilisateurs.update', $utilisateur->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nom</label>
                    <input type="text" name="nom" value="{{ $utilisateur->nom }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Prénom</label>
                    <input type="text" name="prenom" value="{{ $utilisateur->prenom }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $utilisateur->email }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nouveau mot de passe (optionnel)</label>
                    <input type="password" name="mot_de_passe" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Sexe</label>
                    <select name="sexe" class="form-select">
                        <option value="M" {{ $utilisateur->sexe=='M'?'selected':'' }}>Masculin</option>
                        <option value="F" {{ $utilisateur->sexe=='F'?'selected':'' }}>Féminin</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Date de naissance</label>
                    <input type="date" name="date_naissance" 
                           value="{{ $utilisateur->date_naissance }}" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Rôle</label>
                    <select name="role_id" class="form-select">
                        @foreach($roles as $r)
                        <option value="{{ $r->id }}" 
                            {{ $utilisateur->role_id==$r->id?'selected':'' }}>
                            {{ $r->nom_role }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Langue</label>
                    <select name="langue_id" class="form-select">
                        @foreach($langues as $l)
                        <option value="{{ $l->id }}" 
                            {{ $utilisateur->langue_id==$l->id?'selected':'' }}>
                            {{ $l->nom_langue }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control">
                    <br>
                    @if($utilisateur->photo)
                        <img src="{{ asset('storage/'.$utilisateur->photo) }}" 
                             width="80" class="rounded-circle">
                    @endif
                </div>

            </div>

            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary">Retour</a>

        </form>

    </div>
</div>

@endsection
