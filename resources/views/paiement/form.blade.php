@extends('layout')

@section('title', 'Paiement')

@section('content')
<div class="container mt-5">
    <h2>Effectuer un paiement</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
        </div>
    @endif

    <form action="{{ route('paiement.process') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Montant (XOF)</label>
            <input type="number" id="amount" name="amount" class="form-control" min="100" required value="{{ old('amount', 1000) }}">
        </div>

        <button type="submit" class="btn btn-primary">Payer</button>
    </form>
</div>
@endsection
