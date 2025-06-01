@extends('layouts.app')

@section('title', 'Mes Notifications')

@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container py-4">
        <h2>Mes Notifications</h2>

        @forelse ($lignes as $ligne)
            <div class="notification">
                <h4>{{ $ligne->notification->titre }}</h4>
                <p>{{ $ligne->notification->contenu }}</p>
                <small>Envoyé le {{ $ligne->notification->created_at->format('d/m/Y à H:i') }}</small>
            </div>
        @empty
            <p>Aucune notification trouvée.</p>
        @endforelse
    </div>
</div>
@endsection
