@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">📁 Détails du Dossier de l'Inscription #{{ $document->inscription_id }}</h3>
        </div>

        <div class="card-body">

            <ul class="list-group list-group-flush">

                @php
                    $docs = [
                        'Attestation BAC' => $document->attestation_bac,
                        'Relevé de note BAC' => $document->releve_note_bac,
                        'Bulletin Note 1' => $document->bulletin_note1,
                        'Bulletin Note 2' => $document->bulletin_note2,
                        'Bulletin Note 3' => $document->bulletin_note3,
                        'Dernier Diplôme Acquis' => $document->derniere_diplome_acquis,
                        'Pièce d\'identité' => $document->piece_identite,
                        'Certificat de naissance' => $document->certificat_naissance,
                    ];
                @endphp

                @foreach ($docs as $label => $fichier)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>{{ $label }} :</strong>
                        @if ($fichier)
                            <a href="{{ asset('storage/' . $fichier) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                📄 Voir / Télécharger
                            </a>
                        @else
                            <span class="text-muted">Non disponible</span>
                        @endif
                    </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <strong>Date de soumission :</strong>
                    <span>{{ \Carbon\Carbon::parse($document->date_soumission)->format('d/m/Y') }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <strong>Statut de validation :</strong>
                    <span>
                        @switch($document->statut_validation)
                            @case('valide')
                                <span class="badge bg-success">Validé</span>
                                @break
                            @case('refuse')
                                <span class="badge bg-danger">Refusé</span>
                                @break
                            @default
                                <span class="badge bg-warning text-dark">En attente</span>
                        @endswitch
                    </span>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <strong>ID d'inscription :</strong>
                    <span>{{ $document->inscription_id }}</span>
                </li>

            </ul>

            <div class="text-center mt-4">
                <a href="{{ route('admin.inscriptions') }}" class="btn btn-secondary">
                    ⬅ Retour à la liste des documents
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
