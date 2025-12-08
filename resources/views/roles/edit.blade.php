@extends('layout')

@section('title')
<h3>Modifier un rôle</h3>
@endsection

@section('content')

<div class="card shadow-sm p-4">

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom_role" class="form-label">Nom du rôle</label>
            <input type="text" id="nom_role" name="nom_role" class="form-control" 
                   value="{{ old('nom_role', $role->nom_role) }}" required>
            @error('nom_role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Annuler</a>

    </form>

</div>

@endsection
