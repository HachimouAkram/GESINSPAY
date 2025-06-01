@extends('layouts.app')
@section('content')
<div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container bg-white rounded p-4 shadow card border-primary" style="max-width: 1000px;">
        <div class="card-header bg-primary text-white text-center position-relative">
            <i class="fas fa-user-plus me-2"></i>
            Liste des formations

            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm position-absolute top-50 start-0 translate-middle-y ms-2">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>

        @if($formations->isEmpty())
            <p class="text-center text-muted">Aucune formation disponible pour le moment.</p>
            <div class="text-center">
                <a href="{{ route('formations.create') }}" class="btn btn-primary">Ajouter une formation</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix Inscription</th>
                            <th>Prix Mensuel</th>
                            <th>Durée</th>
                            <th>Niveau</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formations as $formation)
                            <tr>
                                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $formation->nom }}</td>
                                <td class="align-middle">
                                    {{ \Illuminate\Support\Str::limit($formation->description, 100) }}
                                </td>
                                <td class="align-middle text-center">{{ $formation->prix_inscription }} FCFA</td>
                                <td class="align-middle text-center">{{ $formation->prix_mensuel }} FCFA</td>
                                <td class="align-middle text-center">{{ $formation->duree }} mois</td>
                                <td class="align-middle text-center">
                                    {{ $formation->niveau <= 3 ? 'Licence ' . $formation->niveau : 'Master ' . ($formation->niveau - 3) }}
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex flex-column gap-2">
                                        <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                        <form action="{{ route('formations.destroy', $formation->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('formations.create') }}" class="btn btn-success">Ajouter une formation</a>
        </div>
    </div>
</div>
@endsection
