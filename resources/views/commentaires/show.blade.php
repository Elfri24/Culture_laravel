@extends('layout')

@section('content')
<h1>Détails du commentaire</h1>

<p><strong>Utilisateur :</strong> {{ $commentaire->utilisateur ? $commentaire->utilisateur->nom : 'N/A' }}</p>
<p><strong>Contenu :</strong> {{ $commentaire->contenu ? $commentaire->contenu->titre : 'N/A' }}</p>
<p><strong>Texte :</strong> {{ $commentaire->texte }}</p>
<p><strong>Note :</strong> {{ $commentaire->note ?? '-' }}</p>
<p><strong>Date :</strong> {{ $commentaire->date ? $commentaire->date->format('d/m/Y') : '-' }}</p>
<p><strong>Créé le :</strong> {{ $commentaire->created_at->format('d/m/Y H:i') }}</p>

<a href="{{ route('commentaires.index') }}" class="btn btn-secondary">Retour à la liste</a>
<a href="{{ route('commentaires.edit', $commentaire) }}" class="btn btn-warning">Modifier</a>
@endsection
