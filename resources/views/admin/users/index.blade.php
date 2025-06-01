@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Liste des Utilisateurs</h2>

        <!-- Section Admins -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Administrateurs</div>
            <div class="card-body">
                @if($admins->count())
                    <ul class="list-group">
                        @foreach($admins as $admin)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $admin->name }} {{ $admin->lastname }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun administrateur trouvé.</p>
                @endif
            </div>
        </div>

        <!-- Étudiants inscrits -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Étudiants inscrits à une formation</div>
            <div class="card-body">
                @if($etudiantsInscrits->count())
                    <ul class="list-group">
                        @foreach($etudiantsInscrits as $etudiant)
                            <li class="list-group-item">
                                {{ $etudiant->name }} {{ $etudiant->lastname }}
                                <span class="badge bg-secondary">{{ $etudiant->formations->pluck('nom')->join(', ') }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucun étudiant inscrit.</p>
                @endif
            </div>
        </div>

        <!-- Étudiants non inscrits -->
        <div class="card">
            <div class="card-header bg-warning">Étudiants non inscrits à une formation</div>
            <div class="card-body">
                @if($etudiantsNonInscrits->count())
                    <ul class="list-group">
                        @foreach($etudiantsNonInscrits as $etudiant)
                            <li class="list-group-item">
                                {{ $etudiant->name }} - {{ $etudiant->email }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Tous les étudiants sont inscrits.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
