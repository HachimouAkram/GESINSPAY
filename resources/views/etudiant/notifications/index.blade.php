@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex bg-light bg-gradient">
    <div class="container py-4">
        <h1 class="text-whit mb-4">📬 Mes notifications</h1>

        @forelse ($lignes as $ligne)
            <div class="mb-3 p-3 rounded" style="background-color: #2c2c2c; border: 1px solid #444;">
                <h5 class="text-info">{{ $ligne->notification->type_message }}</h5>
                <p class="text-light">{{ $ligne->notification->message }}</p>
                <small class="text-secondary">
                    Reçue le {{ $ligne->notification->created_at->format('d/m/Y à H:i') }}
                </small>

                @if (!$ligne->lu)
                    <form method="POST" action="{{ route('notifications.lue', $ligne->id) }}" class="mt-2">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-sm btn-primary">✔ Marquer comme lue</button>
                    </form>
                @else
                    <div class="mt-2">
                        <span class="badge bg-success">Déjà lue</span>
                    </div>
                @endif
            </div>
        @empty
            <div class="alert alert-secondary text-center text-light">
                Aucune notification trouvée.
            </div>
        @endforelse
        <div class="d-flex justify-content-between">
                <a href="{{ route('etudiant.dashboard') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
