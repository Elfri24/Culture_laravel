@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="container-fluid">
    <div class="row">

        {{-- Sidebar simple --}}
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i> Accueil
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('contenus.index') }}">
                            <i class="bi bi-file-text"></i> Mes contenus
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('commentaires.index') }}">
                            <i class="bi bi-chat-dots"></i> Mes commentaires
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person"></i> Mon profil
                        </a>
                    </li>

                    <li class="nav-item mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">Déconnexion</button>
                        </form>
                    </li>

                </ul>
            </div>
        </nav>

        {{-- Main content --}}
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bienvenue, {{ Auth::user()->prenom }} !</h1>
            </div>

            {{-- Stats rapides --}}
            <div class="row mb-4">

                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Contenus validés</h5>
                            <p class="card-text fs-3">{{ $contenusValidesCount }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Contenus en attente</h5>
                            <p class="card-text fs-3">{{ $contenusEnAttenteCount }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Langues parlées</h5>
                            <p class="card-text fs-3">{{ $languesParleesCount }}</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Liste des derniers contenus --}}
            <h4>Mes derniers contenus</h4>
            @if($dernierContenus->isEmpty())
                <p class="text-muted">Aucun contenu créé pour le moment.</p>
            @else
                <div class="list-group mb-4">
                    @foreach($dernierContenus as $contenu)
                        <a href="{{ route('contenus.show', $contenu->id_contenu) }}" class="list-group-item list-group-item-action">
                            <strong>{{ $contenu->titre }}</strong> 
                            <small class="text-muted">({{ $contenu->date_creation->format('d/m/Y') }})</small>
                            <br>
                            <span class="badge bg-{{ $contenu->statut === 'validé' ? 'success' : 'warning' }}">
                                {{ ucfirst($contenu->statut) }}
                            </span>
                        </a>
                    @endforeach
                </div>
            @endif

            {{-- Derniers commentaires --}}
            <h4>Mes derniers commentaires</h4>
            @if($dernierCommentaires->isEmpty())
                <p class="text-muted">Aucun commentaire publié.</p>
            @else
                <ul class="list-group mb-4">
                    @foreach($dernierCommentaires as $commentaire)
                        <li class="list-group-item">
                            <small class="text-muted">{{ $commentaire->date->format('d/m/Y H:i') }}</small><br>
                            {{ Str::limit($commentaire->texte, 100) }}
                            <br>
                            <em>Sur contenu : <a href="{{ route('contenus.show', $commentaire->contenu->id_contenu) }}">{{ $commentaire->contenu->titre }}</a></em>
                        </li>
                    @endforeach
                </ul>
            @endif

        </main>
    </div>
</div>
@endsection
