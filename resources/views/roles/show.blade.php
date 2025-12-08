@extends('layout')

@section('title')
<h3>Détails du rôle</h3>
@endsection

@section('content')

<div class="card shadow-sm p-4">
    <h4>Rôle : {{ $role->nom_role }}</h4>

    <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>

@endsection
