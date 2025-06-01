@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container">
        <h1 class="mb-4">📆 Mes mensualités</h1>

        @forelse ($mensualitesParFormation as $formationLibelle => $mensualites)
            <div class="card mb-4 shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ $formationLibelle }}</h5> {{-- ex: GL - 1 --}}
                </div>
                <div class="card-body p-0">
                    <table class="table mb-0 table-bordered table-striped">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>Date de paiement</th>
                                <th>Montant</th>
                                <th>Payé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mensualites as $mensualite)
                            <tr class="text-center">
                                <td>{{ \Carbon\Carbon::parse($mensualite->date)->format('d/m/Y') }}</td>
                                <td>{{ number_format($mensualite->montant, 2, ',', ' ') }} FCFA</td>
                                <td>
                                    @if ($mensualite->payer)
                                        <span class="badge bg-success">Oui</span>
                                    @else
                                        <span class="badge bg-danger">Non</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucune mensualité trouvée pour vos inscriptions.</p>
        @endforelse
    </div>
</div>
@endsection
