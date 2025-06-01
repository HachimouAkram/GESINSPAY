<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EtudiantUserController extends Controller
{
    public function mesInscriptions()
    {
        $user = Auth::user();

        $inscriptions = Inscription::with(['formation', 'document', 'payement'])
            ->where('utilisateur_id', $user->id)
            ->get()
            ->groupBy('statut');

        return view('etudiant.inscriptions.index', [
            'inscriptionsEnAttente' => $inscriptions['en_attente'] ?? collect(),
            'inscriptionsValidees' => $inscriptions['valide'] ?? collect(),
            'inscriptionsRejetees' => $inscriptions['refuse'] ?? collect(),
        ]);

    }

}
