@extends('layout')

@section('content')
<h1 class="mb-4">Liste des contenus</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('contenus.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle"></i> Ajouter un contenu
</a>

<table id="contenusTable" class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Texte</th>
            <th>Région</th>
            <th>Langue</th>
            <th>Type</th>
            <th>Auteur</th>
            <th>Modérateur</th>
            <th>Statut</th>
            <th>Parent</th>
            <th>Date Création</th>
            <th>Date Validation</th>
            <th>Média</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($contenus as $contenu)
        <tr>
            <td>{{ $contenu->id }}</td>
            <td>{{ $contenu->titre }}</td>
            <td>{{ Str::limit($contenu->texte, 40) }}</td>
            <td>{{ $contenu->region->nom_region ?? 'N/A' }}</td>
            <td>{{ $contenu->langue->nom_langue ?? 'N/A' }}</td>
            <td>{{ $contenu->typeContenu->nom ?? 'N/A' }}</td>
            <td>{{ $contenu->auteur->nom ?? 'N/A' }}</td>
            <td>{{ $contenu->moderateur->nom ?? '-' }}</td>
            <td>{{ $contenu->statut ?? '-' }}</td>
            <td>{{ $contenu->parent->titre ?? '-' }}</td>

            <td>
                @if ($contenu->date_creation)
                    {{ \Carbon\Carbon::parse($contenu->date_creation)->format('d/m/Y') }}
                @else
                    -
                @endif
            </td>

            <td>
                @if ($contenu->date_validation)
                    {{ \Carbon\Carbon::parse($contenu->date_validation)->format('d/m/Y') }}
                @else
                    -
                @endif
            </td>

            {{-- Média --}}
            <td>
                @php $media = $contenu->medias->first() ?? null; @endphp

                @if ($media)
                    @php $type = strtolower($media->type ?? ''); @endphp

                    @if (Str::contains($type, ['jpg','jpeg','png','gif','webp']))
                        <img src="{{ asset($media->chemin) }}" width="50" class="rounded shadow">
                    @else
                        <a href="{{ asset($media->chemin) }}" target="_blank">Fichier</a>
                    @endif
                @else
                    <span class="text-muted">—</span>
                @endif
            </td>

            {{-- Actions --}}
            <td class="text-center">

                <a href="{{ route('contenus.show', $contenu->id) }}" 
                   class="btn btn-sm btn-info me-1" title="Voir">
                    <i class="bi bi-eye"></i>
                </a>

                <a href="{{ route('contenus.edit', $contenu->id) }}" 
                   class="btn btn-sm btn-warning me-1" title="Modifier">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form action="{{ route('contenus.destroy', $contenu->id) }}" method="POST"
                      class="d-inline" onsubmit="return confirm('Supprimer ce contenu ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" title="Supprimer">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<!-- JQuery + DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
    $(document).ready(function () {
        $('#contenusTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            pageLength: 10,
            responsive: true
        });
    });
</script>
@endsection
