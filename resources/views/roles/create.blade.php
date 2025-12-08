@extends('layout')

@section('title')
    Ajouter un rôle
@endsection

@section('content')
    <div class="max-w-md mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Ajouter un rôle</h1>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nom_role" class="form-label">Nom du rôle</label>
                <input type="text" name="nom_role" id="nom_role" class="form-control"
                       value="{{ old('nom_role') }}" required placeholder="Ex: Administrateur">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary ms-2">Annuler</a>
        </form>
    </div>
@endsection
