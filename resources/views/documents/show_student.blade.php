@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">📁 Vos documents pour l'inscription #{{ $document->inscription_id }}</h3>
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
    <div>
        <a href="{{ asset('storage/' . $fichier) }}" target="_blank" class="btn btn-sm btn-outline-info me-2">
            📄 Voir / Télécharger
        </a>
        <a href="{{ route('documents.editChamp', ['document' => $document->id, 'champ' => \Str::slug($label, '_')]) }}" class="btn btn-sm btn-warning">
            ✏️ Modifier
        </a>
    </div>
@else
    <a href="{{ route('documents.editChamp', ['document' => $document->id, 'champ' => \Str::slug($label, '_')]) }}" class="btn btn-sm btn-success">
        ➕ Ajouter
    </a>
@endif

                    </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <strong>Date de soumission :</strong>
                    <span>{{ \Carbon\Carbon::parse($document->date_soumission)->format('d/m/Y') ?? 'Non soumise' }}</span>
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

            </ul>

            <div class="text-center mt-4">
                <a href="{{ route('etudiant.inscriptions') }}" class="btn btn-secondary">
                    ⬅ Retour à vos inscriptions
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
