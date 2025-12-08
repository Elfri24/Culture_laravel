@extends('layout')

@section('title')
    <h3>Ajouter une langue</h3>
@endsection

@section('content')
    <div class="card p-4 shadow-sm">

        <form method="POST" action="{{ route('langues.store') }}">
            @csrf

            {{-- Nom de la langue --}}
            <div class="mb-3">
                <label class="form-label">Nom de la langue</label>
                <input type="text" name="nom_langue" class="form-control @error('nom_langue') is-invalid @enderror"
                    value="{{ old('nom_langue') }}" required>

                @error('nom_langue')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Code langue --}}
            <div class="mb-3">
                <label class="form-label">Code langue (ex: fr, en, yor, fon)</label>
                <input type="text" name="code_langue" class="form-control @error('code_langue') is-invalid @enderror"
                    maxlength="10" value="{{ old('code_langue') }}" required>

                @error('code_langue')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success">Enregistrer</button>
            <a href="{{ route('langues.index') }}" class="btn btn-secondary">Annuler</a>
        </form>

    </div>
@endsection
