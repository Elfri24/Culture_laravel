@extends('layout')

@section('content')
    <h1 class="mb-4">Détails du contenu</h1>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>Titre</th>
                <td>{{ $contenu->titre }}</td>
            </tr>
            <tr>
                <th>Texte</th>
                <td>{{ $contenu->texte }}</td>
            </tr>
            <tr>
                <th>Région</th>
                <td>{{ $contenu->region->nom ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Langue</th>
                <td>{{ $contenu->langue->nom ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{ $contenu->typeContenu->nom ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Auteur</th>
                <td>{{ $contenu->auteur->nom ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Modérateur</th>
                <td>{{ $contenu->moderateur ? $contenu->moderateur->nom : '-' }}</td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>{{ $contenu->statut ?? '-' }}</td>
            </tr>
            <tr>
                <th>Parent</th>
                <td>{{ $contenu->parent ? $contenu->parent->titre : '-' }}</td>
            </tr>
            <tr>
                <th>Date de création</th>
                <td>{{ $contenu->date_creation ?? '-' }}</td>
            </tr>
            <tr>
                <th>Date de validation</th>
                <td>{{ $contenu->date_validation ?? '-' }}</td>
            </tr>
            <tr>
                <th>Créé le</th>
                <td>{{ $contenu->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('contenus.index') }}" class="btn btn-secondary">Retour à la liste</a>
        <a href="{{ route('contenus.edit', $contenu) }}" class="btn btn-warning">Modifier</a>
        <!-- Bouton Payer -->
        <a href="{{ route('paiement.form', $contenu) }}" class="btn btn-success">Payer</a>
    </div>
@endsection
