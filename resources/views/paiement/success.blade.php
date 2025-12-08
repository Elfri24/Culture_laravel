@extends('layout')

@section('title', 'Paiement réussi')

@section('content')
<div class="container mt-5">
    <h2>Merci, votre paiement a été effectué avec succès !</h2>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
</div>
@endsection
