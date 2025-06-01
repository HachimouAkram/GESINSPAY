@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Téléverser le document : {{ ucwords(str_replace('_', ' ', $champ)) }}</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('documents.updateChamp', ['document' => $document->id, 'champ' => $champ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="fichier" class="form-label">Fichier (PDF, image...)</label>
                    <input type="file" name="fichier" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">📤 Enregistrer</button>
                <a href="{{ route('showForStudent', $document->id) }}" class="btn btn-secondary">⬅ Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
