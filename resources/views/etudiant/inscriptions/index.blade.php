@extends('layouts.app')

@section('content')
<style>
    .header-inscriptions {
        background-color: #000;
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 2.5rem;
        font-weight: bold;
        transition: color 1s;
    }

    .inscription-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    .color-transition {
        transition: color 1s;
    }
</style>

<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container py-4">

        {{-- TITRE FIXE + CHANGEMENT DE COULEUR --}}
        <div id="titreInscriptions" class="header-inscriptions">
            🎓 Mes Inscriptions
        </div>

        {{-- BOUTONS EN HAUT --}}
        <div class="inscription-buttons">
            <a href="{{ route('etudiant.dashboard') }}" class="btn btn-outline-secondary">
                ← Retour au tableau de bord
            </a>
            <a href="{{ route('inscriptions.create') }}" class="btn btn-success">
                + Nouvelle inscription
            </a>
        </div>

        {{-- Composant : Inscriptions en attente --}}
        <x-etudiant.section-inscriptions
            titre="Inscriptions en attente"
            couleur="warning"
            :inscriptions="$inscriptionsEnAttente"
            boutonPayement="non" />

        {{-- Composant : Inscriptions validées --}}
        <x-etudiant.section-inscriptions
            titre="Inscriptions validées"
            couleur="success"
            :inscriptions="$inscriptionsValidees"
            boutonPayement="oui" />

        {{-- Composant : Inscriptions refusées --}}
        <x-etudiant.section-inscriptions
            titre="Inscriptions refusées"
            couleur="danger"
            :inscriptions="$inscriptionsRejetees"
            boutonPayement="non" />

    </div>
</div>

{{-- Script pour changement de couleur du titre toutes les 10s --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const titre = document.getElementById('titreInscriptions');
        const couleurs = ['text-primary', 'text-success', 'text-warning', 'text-danger'];
        let index = 0;

        setInterval(() => {
            titre.classList.remove(...couleurs);
            titre.classList.add(couleurs[index]);
            index = (index + 1) % couleurs.length;
        }, 10000);
    });
</script>
@endsection
