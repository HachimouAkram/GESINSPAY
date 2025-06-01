@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Modifier une Formation</h2>

    <form action="{{ route('formations.update', $formation->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT') <!-- Important pour que Laravel reconnaisse que c'est une mise à jour -->

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $formation->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $formation->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prix_inscription" class="form-label">Prix d'inscription</label>
            <input type="number" name="prix_inscription" class="form-control" value="{{ $formation->prix_inscription }}" required>
        </div>

        <div class="mb-3">
            <label for="prix_mensuel" class="form-label">Prix mensuel</label>
            <input type="number" name="prix_mensuel" class="form-control" value="{{ $formation->prix_mensuel }}" required>
        </div>

        <div class="mb-3">
            <label for="duree" class="form-label">Durée</label>
            <input type="text" name="duree" class="form-control" value="{{ $formation->duree }}" required>
        </div>

        <div class="mb-3">
            <label for="niveau" class="form-label">Niveau</label>
            <input type="text" name="niveau" class="form-control" value="{{ $formation->niveau }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
