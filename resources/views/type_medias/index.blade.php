@extends('layout')

@section('title')
    Liste des Types de Médias
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('typeMedia.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nouveau Type de Média
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="typeMediaTable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom du Type</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($type_medias as $tm)
                <tr>
                    <td>{{ $tm->id }}</td>
                    <td>{{ $tm->nom_media }}</td>
                    <td>

                        {{-- Voir --}}
                        <a href="{{ route('typeMedia.show', $tm->id) }}" class="btn btn-info btn-sm me-1" title="Voir">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        {{-- Modifier --}}
                        <a href="{{ route('typeMedia.edit', $tm->id) }}" class="btn btn-warning btn-sm me-1"
                            title="Modifier">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        {{-- Supprimer --}}
                        <form action="{{ route('typeMedia.destroy', $tm->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" title="Supprimer">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@section('scripts')
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(function() {
            $('#typeMediaTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"
                },
                pageLength: 10,
                lengthChange: false,
            });
        });
    </script>
@endsection
