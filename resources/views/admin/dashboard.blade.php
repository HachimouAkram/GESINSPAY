@extends('layouts.app')

@section('title', 'Espace Administrateur')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container py-4">
        <!-- En-tête -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">
                <i class="fas fa-user-cog text-white me-2"></i>
                Espace Administrateur
            </h1>
            <div class="badge bg-dark">
                Bonjour {{ Auth::user()->name }} {{ Auth::user()->lastname }}
            </div>
        </div>

        <!-- Cartes de fonctionnalités -->
        <div class="row g-4">
            <!-- Gérer les inscriptions -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-primary h-100">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user-check me-2"></i>
                        Gérer les Inscriptions
                    </div>
                    <div class="card-body">
                        <p>Validez et suivez les inscriptions des étudiants</p>
                        <a href="{{ route('admin.inscriptions') }}" class="btn btn-outline-primary w-100">
                            Accéder à la gestion
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gérer les formations -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-secondary h-100">
                    <div class="card-header bg-secondary text-white">
                        <i class="fas fa-book-open me-2"></i>
                        Gérer les Formations
                    </div>
                    <div class="card-body">
                        <p>Ajoutez, modifiez ou supprimez des formations</p>
                        <a href="{{ route('formations.store') }}" class="btn btn-outline-primary w-100">
                            Accéder aux formation
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gérer les paiements -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-success h-100">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-money-bill-wave me-2"></i>
                        Gérer les Paiements
                    </div>
                    <div class="card-body">
                        <p>Suivez et gérez les paiements effectués</p>
                        <button class="btn btn-outline-success w-100" disabled>
                            Accéder aux paiements
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gérer les comptes utilisateurs -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-dark h-100">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-users-cog me-2"></i>
                        Gérer les Comptes Utilisateurs
                    </div>
                    <div class="card-body">
                        <p>Créez, modifiez ou supprimez les comptes</p>
                        <button class="btn btn-outline-dark w-100" disabled>
                            Gérer les utilisateurs
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gérer les notifications -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-info h-100">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-bell me-2"></i>
                        Gérer les Notifications
                    </div>
                    <div class="card-body">
                        <p>Envoyez des notifications aux utilisateurs</p>
                        <a href="{{ route('notifications.index') }}" class="btn btn-outline-primary w-100">
                            Accéder aux notification
                        </a>
                    </div>
                </div>
            </div>

            <!-- Message d'information -->
            <div class="col-12 mt-4">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>En développement :</strong> Ces fonctionnalités seront disponibles prochainement.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
