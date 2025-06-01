@props(['titre', 'couleur', 'inscriptions', 'boutonPayement'])

<div class="card mb-4 shadow">
    <div class="card-header bg-{{ $couleur }} text-white text-center fw-bold">
        {{ $titre }}
    </div>
    <div class="card-body">
        @if ($inscriptions->isEmpty())
            <p class="text-center text-muted">Aucune inscription.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Formation</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Documents</th>
                            @if($boutonPayement === 'oui')
                                <th>Paiement</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscriptions as $inscription)
                            <tr>
                                <td>{{ $inscription->id }}</td>
                                <td> @if ($inscription->formation->niveau<=3)
                                    Licence {{ $inscription->formation->niveau ?? 'N/A' }}
                                @else
                                    Master {{ $inscription->formation->niveau-3 ?? 'N/A' }}
                                @endif en {{ $inscription->formation->nom ?? 'N/A' }}</td>
                                <td>{{ $inscription->date }}</td>
                                <td>
                                    <span class="badge bg-{{ $couleur }}">{{ ucfirst($inscription->statut) }}</span>
                                </td>
                                <td>
                                   @if ($inscription->document)
                                        <a href="{{ route('showForStudent', ['inscription_id' => $inscription->id]) }}" class="btn btn-info btn-sm">
                                            📂 Voir / Modifier
                                        </a>
                                    @else
                                        <a href="{{ route('documents.create', ['inscription_id' => $inscription->id]) }}" class="btn btn-outline-success btn-sm">
                                            ➕ Ajouter document
                                        </a>
                                    @endif

                                </td>

                                @if($boutonPayement === 'oui')
                                    <td>
                                        @if (!$inscription->paiement)
                                            <a href="{{ route('inscriptions.payer', $inscription->id) }}" class="btn btn-primary btn-sm">Payer</a>
                                        @else
                                            <span class="badge bg-success">Déjà payé</span>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
