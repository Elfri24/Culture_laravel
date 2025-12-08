@extends('layout')

@section('title')
    Liste des types de contenus
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('typeContenu.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Ajouter un type
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover" id="typesTable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->nom_contenu }}</td>
                    <td>
                        <a href="{{ route('typeContenu.show', $type->id) }}" class="btn btn-info btn-sm me-1" title="Voir">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <a href="{{ route('typeContenu.edit', $type->id) }}" class="btn btn-warning btn-sm me-1"
                            title="Modifier">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('typeContenu.destroy', $type->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce type ?')">
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
    <!-- DataTables CSS & JS -->
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(function() {
            $('#typesTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.5/i18n/fr-FR.json"
                },
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                lengthChange: false
            });
        });
    </script>
@endsection
