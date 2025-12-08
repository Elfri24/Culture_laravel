@extends('layout')

@section('content')
<h1>Liste des commentaires</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('commentaires.create') }}" class="btn btn-primary mb-3">Ajouter un commentaire</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Utilisateur</th>
            <th>Contenu</th>
            <th>Texte</th>
            <th>Note</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($commentaires as $commentaire)
        <tr>
            <td>{{ $commentaire->id }}</td>
            <td>{{ $commentaire->utilisateur ? $commentaire->utilisateur->nom : 'N/A' }}</td>
            <td>{{ $commentaire->contenu ? Str::limit($commentaire->contenu->titre ?? '', 30) : 'N/A' }}</td>
            <td>{{ Str::limit($commentaire->texte, 50) }}</td>
            <td>{{ $commentaire->note ?? '-' }}</td>
            <td>{{ $commentaire->date ? $commentaire->date->format('d/m/Y') : '-' }}</td>
            <td>
                <a href="{{ route('commentaires.show', $commentaire) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('commentaires.edit', $commentaire) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('commentaires.destroy', $commentaire) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce commentaire ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
