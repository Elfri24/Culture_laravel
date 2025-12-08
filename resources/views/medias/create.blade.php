@extends('layout')

@section('title')
<h3>Ajouter un média</h3>
@endsection

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="card-title">Nouveau média</h4>
    </div>

    <div class="card-body">

        {{-- Gestion des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                {{-- Fichier média --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Fichier média</label>
                    <input 
                        type="file" 
                        name="media_file" 
                        class="form-control @error('media_file') is-invalid @enderror"
                        required
                    >
                    @error('media_file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Type de média --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Type de média</label>
                    <select 
                        name="type_media_id" 
                        class="form-select @error('type_media_id') is-invalid @enderror"
                        required
                    >
                        <option value="">Choisir...</option>
                        @foreach($typeMedias as $type)
                            <option value="{{ $type->id }}" {{ old('type_media_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->libelle }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_media_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Contenu associé --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Contenu associé</label>
                    <select 
                        name="contenu_id" 
                        class="form-select @error('contenu_id') is-invalid @enderror"
                    >
                        <option value="">Aucun</option>
                        @foreach($contenus as $contenu)
                            <option value="{{ $contenu->id }}" {{ old('contenu_id') == $contenu->id ? 'selected' : '' }}>
                                {{ $contenu->titre }}
                            </option>
                        @endforeach
                    </select>
                    @error('contenu_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('media.index') }}" class="btn btn-secondary">Annuler</a>

        </form>

    </div>
</div>

@endsection
