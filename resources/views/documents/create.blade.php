@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container bg-white rounded p-4 shadow" style="max-width: 700px;">
        <h2 class="text-center mb-4">📁 Ajouter un Dossier</h2>

        {{-- Message succès --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Message erreurs --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire --}}
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- Fichiers requis --}}
            @php
                $documents = [
                    'attestation_bac' => 'Attestation BAC',
                    'releve_note_bac' => 'Relevé de note BAC',
                    'bulletin_note1' => 'Bulletin Note 1',
                    'bulletin_note2' => 'Bulletin Note 2',
                    'bulletin_note3' => 'Bulletin Note 3',
                    'derniere_diplome_acquis' => 'Dernier Diplôme Acquis',
                    'piece_identite' => "Pièce d'identité",
                    'certificat_naissance' => 'Certificat de naissance'
                ];
            @endphp

            @foreach($documents as $name => $label)
                <div class="mb-3">
                    <label for="{{ $name }}" class="form-label fw-bold">{{ $label }}</label>
                    <input type="file" name="{{ $name }}" id="{{ $name }}"
                        class="form-control @error($name) is-invalid @enderror" required>
                    @error($name)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            {{-- Champ caché inscription_id --}}
            <input type="hidden" name="inscription_id" value="{{ $inscriptionId }}">

            {{-- Boutons --}}
            <div class="d-flex justify-content-center gap-3 mt-4">
                <button type="submit" class="btn btn-primary px-4">Soumettre</button>
                <a href="{{ route('etudiant.dashboard') }}" class="btn btn-secondary px-4">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
