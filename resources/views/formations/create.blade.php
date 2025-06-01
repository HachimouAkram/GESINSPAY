@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container bg-white rounded p-4 shadow" style="max-width: 600px;">
        <h2 class="text-center mb-4">Ajouter une formation</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('formations.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required value="{{ old('nom') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="duree" class="form-label">Durée (en heures)</label>
                <input type="number" name="duree" class="form-control" required value="{{ old('duree') }}">
            </div>

            <div class="mb-3">
                <label for="prix_inscription" class="form-label">Prix d'inscription</label>
                <input type="number" name="prix_inscription" class="form-control" step="0.01" required value="{{ old('prix_inscription') }}">
            </div>

            <div class="mb-3">
                <label for="prix_mensuel" class="form-label">Prix mensuel</label>
                <input type="number" name="prix_mensuel" class="form-control" step="0.01" required value="{{ old('prix_mensuel') }}">
            </div>

            <div class="mb-3">
                <label for="date_debut" class="form-label">Date de début</label>
                <input type="date" name="date_debut" class="form-control" required value="{{ old('date_debut') }}">
            </div>

            <div class="mb-3">
                <label for="niveau" class="form-label">Niveau (Entier)</label>
                <input type="number" name="niveau" class="form-control" required value="{{ old('niveau') }}">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('formations.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</div>
@endsection
