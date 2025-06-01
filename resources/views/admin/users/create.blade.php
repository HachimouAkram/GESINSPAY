@extends('layouts.app')

@section('title', 'Ajouter un Utilisateur')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Ajouter un Utilisateur</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Prénom</label>
            <input type="text" name="lastname" id="lastname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="type_profil" class="form-label">Type de Profil</label>
            <select name="type_profil" id="type_profil" class="form-select" required>
                <option value="">-- Choisir --</option>
                <option value="admin">Admin</option>
                <option value="etudiant">Étudiant</option>
            </select>
        </div>

        <div class="mb-3">
            <p class="text-muted"><strong>Mot de passe par défaut :</strong> <code>passer123</code></p>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
    </form>
</div>
@endsection
