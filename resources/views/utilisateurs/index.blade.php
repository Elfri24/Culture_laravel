@extends('layout')

@section('title')
    Liste des utilisateurs
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('utilisateurs.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Ajouter un utilisateur
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover" id="usersTable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom complet</th>
                <th>Email</th>
                <th>Sexe</th>
                <th>Rôle</th>
                <th>Langue</th>
                <th>Date inscription</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($utilisateurs as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->nom }} {{ $u->prenom }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->sexe }}</td>
                    <td>{{ $u->role->nom_role ?? '—' }}</td>
                    <td>{{ $u->langue->nom_langue ?? '—' }}</td>
                    <td>{{ $u->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('utilisateurs.show', $u->id) }}" class="btn btn-info btn-sm me-1" title="Voir">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="{{ route('utilisateurs.edit', $u->id) }}" class="btn btn-warning btn-sm me-1"
                            title="Modifier">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('utilisateurs.destroy', $u->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">
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
            $('#usersTable').DataTable({
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
