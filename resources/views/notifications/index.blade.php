@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Toutes les Notifications</h2>

    @forelse ($notifications as $notification)
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <strong>{{ $notification->type_message ?? 'Notification' }}</strong>
            </div>

            <div class="card-body">
                <p>{{ $notification->message }}</p>

                <p>
                    <strong>Nombre de destinataires :</strong> {{ $notification->lignes->count() }}
                </p>

                <ul class="list-group">
                    @foreach ($notification->lignes as $ligne)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                {{ $ligne->utilisateur->name ?? 'Utilisateur inconnu' }}
                                <small class="text-muted d-block">
                                    Reçu le {{ \Carbon\Carbon::parse($ligne->date)->format('d/m/Y H:i') }}
                                </small>
                            </div>

                            @if (!$ligne->lu)
                                <span class="badge bg-danger">Non Lue</span>
                            @else
                                <span class="badge bg-success">Lue</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @empty
        <p>Aucune notification enregistrée.</p>
    @endforelse
</div>
@endsection
