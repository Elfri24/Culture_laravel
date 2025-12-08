@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto py-10">
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h1 class="text-2xl font-bold">Liste des médias</h1>
        <a href="{{ route('media.create') }}" class="btn btn-primary">
            Ajouter un média
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-4">
        <table id="mediaTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Aperçu</th>
                    <th>Type</th>
                    <th>Taille (Ko)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medias as $media)
                    <tr>
                        <td>{{ $media->id }}</td>
                        <td>
                            @php
                                $typeLower = strtolower($media->type);
                            @endphp
                            @if (Str::contains($typeLower, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                <img src="{{ asset($media->chemin) }}" class="rounded" alt="Aperçu média #{{ $media->id }}" style="width: 64px; height: 64px; object-fit: cover;">
                            @else
                                <span class="text-muted fst-italic">Fichier</span>
                            @endif
                        </td>
                        <td>{{ $media->type }}</td>
                        <td>{{ number_format($media->taille, 0, ',', ' ') }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('media.show', $media->id) }}" class="btn btn-info btn-sm" title="Voir">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('media.edit', $media->id) }}" class="btn btn-warning btn-sm" title="Modifier">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('media.destroy', $media->id) }}" onsubmit="return confirm('Supprimer ce média ?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
    <!-- DataTables CSS/JS via CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mediaTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"
                },
                pageLength: 10
            });
        });
    </script>
@endsection
