@extends('layouts.app')

@section('content')
<style>
    .marquee-text {
        position: relative;
        height: 50px;
        background-color: #000;
        overflow: hidden;
    }

    .marquee-text h1 {
        position: absolute;
        white-space: nowrap;
        display: inline-block;
        color: white;
        font-size: 1.5rem;
        padding-left: 100%;
        animation: scroll-left 12s linear infinite;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
</style>

<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container py-4">
        <div class="marquee-text mb-5">
            <h1>📋 Gestion des Inscriptions par Statut</h1>
        </div>

        <!-- SECTION : EN ATTENTE -->
        <div class="card mb-5 shadow">
            <div class="card-header bg-warning text-dark text-center fw-bold">
                Inscriptions en attente
            </div>
            <div class="card-body">
                @if($inscriptionsEnAttente->isEmpty())
                    <p class="text-center">✅ Aucune inscription en attente.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Formation</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                    <th>Documents</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscriptionsEnAttente as $inscription)
                                    <tr>
                                        <td>{{ $inscription->id }}</td>
                                        <td>{{ $inscription->user->name ?? 'N/A' }}</td>
                                        <td>{{ $inscription->formation->nom ?? 'N/A' }}</td>
                                        <td>{{ $inscription->date }}</td>
                                        <td><span class="badge bg-warning text-dark">En attente</span></td>
                                        <td>
                                            <a href="{{ route('inscriptions.valider', $inscription->id) }}" class="btn btn-success btn-sm me-2">Valider</a>
                                            <a href="{{ route('inscriptions.refuser', $inscription->id) }}" class="btn btn-danger btn-sm">Refuser</a>
                                        </td>
                                        <td>
                                            @if ($inscription->document)
                                                <a href="{{ route('documents.show', $inscription->document->id) }}" class="btn btn-info btn-sm">Voir documents</a>
                                            @else
                                                <span class="text-muted">Aucun</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- SECTION : VALIDÉES -->
        <div class="card mb-5 shadow">
            <div class="card-header bg-success text-white text-center fw-bold">
                Inscriptions validées
            </div>
            <div class="card-body">
                @if($inscriptionsValidees->isEmpty())
                    <p class="text-center">📭 Aucune inscription validée.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Formation</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Documents</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscriptionsValidees as $inscription)
                                    <tr>
                                        <td>{{ $inscription->id }}</td>
                                        <td>{{ $inscription->user->name ?? 'N/A' }} {{ $inscription->user->lastname ?? 'N/A' }}</td>
                                        <td>{{ $inscription->formation->nom ?? 'N/A' }}</td>
                                        <td>{{ $inscription->date }}</td>
                                        <td><span class="badge bg-success">Validée</span></td>
                                        <td>
                                            @if ($inscription->document)
                                                <a href="{{ route('documents.show', $inscription->document->id) }}" class="btn btn-info btn-sm">Voir documents</a>
                                            @else
                                                <span class="text-muted">Aucun</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- SECTION : REFUSÉES -->
        <div class="card shadow">
            <div class="card-header bg-danger text-white text-center fw-bold">
                Inscriptions refusées
            </div>
            <div class="card-body">
                @if($inscriptionsRejetees->isEmpty())
                    <p class="text-center">🚫 Aucune inscription refusée.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Formation</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Documents</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscriptionsRejetees as $inscription)
                                    <tr>
                                        <td>{{ $inscription->id }}</td>
                                        <td>{{ $inscription->user->name ?? 'N/A' }} {{ $inscription->user->lastname ?? 'N/A' }}</td>
                                        <td>{{ $inscription->formation->nom ?? 'N/A' }}</td>
                                        <td>{{ $inscription->date }}</td>
                                        <td><span class="badge bg-danger">Refusée</span></td>
                                        <td>
                                            @if ($inscription->document)
                                                <a href="{{ route('documents.show', $inscription->document->id) }}" class="btn btn-info btn-sm">Voir documents</a>
                                            @else
                                                <span class="text-muted">Aucun</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
