@extends('layout')

@section('title')
<h3>Détails utilisateur</h3>
@endsection

@section('content')

<div class="card shadow-sm">

    <div class="card-header">
        <h4 class="card-title">{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h4>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4 text-center mb-3">
                @if($utilisateur->photo)
                    <img src="{{ asset('storage/'.$utilisateur->photo) }}" 
                         class="rounded-circle mb-3" width="130">
                @else
                    <img src="{{ asset('img/user-default.png') }}" 
                         class="rounded-circle mb-3" width="130">
                @endif
            </div>

            <div class="col-md-8">

                <p><strong>Email : </strong> {{ $utilisateur->email }}</p>
                <p><strong>Sexe : </strong> {{ $utilisateur->sexe }}</p>
                <p><strong>Date de naissance : </strong> {{ $utilisateur->date_naissance }}</p>
                <p><strong>Rôle : </strong> {{ $utilisateur->role->nom_role }}</p>
                <p><strong>Langue : </strong> {{ $utilisateur->langue->nom_langue }}</p>
                <p><strong>Inscription : </strong> {{ $utilisateur->created_at->format('d/m/Y') }}</p>

            </div>

        </div>

        <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary mt-3">Retour</a>

    </div>
</div>

@endsection
