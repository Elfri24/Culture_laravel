@extends('layout')

@section('title')
<h3>Détails de la langue</h3>
@endsection

@section('content')

<div class="card p-4 shadow-sm">

    <p><strong>ID :</strong> {{ $langue->id }}</p>
    <p><strong>Nom :</strong> {{ $langue->nom_langue }}</p>

    <a href="{{ route('langues.index') }}" class="btn btn-primary">Retour</a>

</div>

@endsection
