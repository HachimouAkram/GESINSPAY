@extends('layouts.app')



@section('title', 'Espace Étudiant')

@section('content')
<div class="min-vh-100 d-flex justify-content-center  bg-light">
    <div class="container py-4">
        <!-- En-tête -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">
                <i class="fas fa-user-graduate text-white me-2"></i>
                Espace Étudiant
            </h1>
            <div class="badge bg-primary">
                Bonjour {{ Auth::user()->name }} {{ Auth::user()->lastname }}
            </div>
        </div>

        <!-- Cartes de fonctionnalités -->
        <div class="row g-4">
            <!-- Carte Inscription -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-primary h-100">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user-plus me-2"></i>
                        Inscription aux Cours
                    </div>
                    <div class="card-body">
                        <p>Gérez vos inscriptions aux différentes formations</p>
                        <a href="{{ route('etudiant.inscriptions') }}" class="btn btn-outline-primary w-100">
                            Accéder à l'inscription
                        </a>
                    </div>
                </div>
            </div>

            <!-- Carte Paiements -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-success h-100">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-credit-card me-2"></i>
                        Gestion des Paiements
                    </div>
                    <div class="card-body">
                        <p>Consultez et payez vos mensualités</p>
                        <button class="btn btn-outline-success w-100" disabled>
                            Accéder aux paiements
                        </button>
                    </div>
                </div>
            </div>

            <!-- Carte Notifications -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-info h-100">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-bell me-2"></i>
                        Mes Notifications
                    </div>
                    <div class="card-body">
                        <p>Consultez vos dernières notifications</p>
                        <a href="{{ route('etudiant.notifications') }}" class="btn btn-outline-info w-100">
                            Voir les notifications
                        </a>
                    </div>
                </div>
            </div>

            <!-- Carte Échéances -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-warning h-100">
                    <div class="card-header bg-warning text-white">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Échéances à Venir
                    </div>
                    <div class="card-body">
                        <p>Visualisez vos prochaines échéances</p>
                        <a href="{{ route('mensualites.index') }}" class="btn btn-outline-warning w-100">
                            Voir le calendrier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
