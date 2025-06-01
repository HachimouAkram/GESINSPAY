<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use App\Models\Inscription;
use App\Models\Mensualite;
use Carbon\Carbon;
use Exception;

class InscriptionController extends Controller
{
    use GenerateApiResponse;

    /**
     * Affiche la liste des inscriptions (réservé aux admins).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (optional(Auth::user()->type_profil)->type_profil !== 'admin') {
            abort(403, 'Accès réservé aux administrateurs.');
        }

        // Ici on suppose que la colonne est 'statut' et non 'statut_validation'
        $enAttente = Inscription::where('statut', 'en_attente')->get();
        $validees = Inscription::where('statut', 'valide')->get();
        $rejetees = Inscription::where('statut', 'refuse')->get();

        return view('inscriptions.index', compact('enAttente', 'validees', 'rejetees'));
    }

    /**
     * Affiche les inscriptions par statut (vue admin).
     *
     * @return \Illuminate\View\View
     */
    public function indexParStatut()
    {
        $inscriptionsEnAttente = Inscription::where('statut', 'en_attente')->get();
        $inscriptionsValidees = Inscription::where('statut', 'valide')->get();
        $inscriptionsRejetees = Inscription::where('statut', 'refuse')->get();

        return view('admin.inscriptions_par_statut', compact(
            'inscriptionsEnAttente',
            'inscriptionsValidees',
            'inscriptionsRejetees'
        ));
    }

    /**
     * Valide une inscription et crée les mensualités correspondantes.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function valider($id)
    {
        $inscription = Inscription::findOrFail($id);

        $inscription->statut = 'valide';
        $inscription->save();

        $formation = $inscription->formation;
        $dateDebut = Carbon::parse($formation->date_debut);
        $montant = $formation->prix_mensuel;
        $duree = $formation->duree; // en mois

        for ($i = 1; $i <= $duree; $i++) {
            $datePaiement = $dateDebut->copy()->addMonths($i)->day(10);

            Mensualite::create([
                'date' => $datePaiement,
                'montant' => $montant,
                'payer' => false,
                'inscription_id' => $inscription->id,
            ]);
        }

        return redirect()->back()->with('success', 'Inscription validée et mensualités créées.');
        // Ou remplacer par la ligne ci-dessous selon ton besoin :
        // return redirect()->route('admin.inscriptions_par_statut');
    }

    /**
     * Refuse une inscription.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refuser($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->statut = 'refuse';
        $inscription->save();

        return redirect()->back()->with('success', 'Inscription refusée avec succès.');
    }

    /**
     * Met à jour le statut d'une inscription (validée ou rejetée).
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatut(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:valide,refuse',
        ]);

        $inscription = Inscription::findOrFail($id);
        $inscription->statut = $request->statut;
        $inscription->save();

        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
    }

    /**
     * Affiche le formulaire de création d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $formations = Formation::all();

        return view('inscriptions.create', compact('formations'));
    }

    /**
     * Stocke une nouvelle inscription.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'statut' => 'required|string',
            'utilisateur_id' => 'required|exists:users,id',
            'formation_id' => 'required|exists:formations,id',
        ]);

        try {
            $inscription = new Inscription();
            $inscription->date = $request->date;
            $inscription->statut = $request->statut;
            $inscription->utilisateur_id = $request->utilisateur_id;
            $inscription->formation_id = $request->formation_id;

            if ($inscription->save()) {
                return $this->successResponse($inscription, 'Insertion réussie');
            }
        } catch (Exception $e) {
            return $this->errorResponse('Insertion échouée', 500, $e->getMessage());
        }
    }

    /**
     * Met à jour une inscription existante.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'statut' => 'required|string',
            'utilisateur_id' => 'required|exists:users,id',
            'formation_id' => 'required|exists:formations,id',
        ]);

        try {
            $inscription = Inscription::findOrFail($id);
            $inscription->date = $request->date;
            $inscription->statut = $request->statut;
            $inscription->utilisateur_id = $request->utilisateur_id;
            $inscription->formation_id = $request->formation_id;

            if ($inscription->save()) {
                return $this->successResponse($inscription, 'Mise à jour réussie');
            }
        } catch (Exception $e) {
            return $this->errorResponse('Mise à jour échouée', 500, $e->getMessage());
        }
    }

    /**
     * Supprime une inscription.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $inscription = Inscription::findOrFail($id);
            if ($inscription->delete()) {
                return $this->successResponse($inscription, 'Suppression réussie');
            }
        } catch (Exception $e) {
            return $this->errorResponse('Suppression échouée', 500, $e->getMessage());
        }
    }

    /**
     * Affiche une inscription spécifique.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $inscription = Inscription::findOrFail($id);
            return $this->successResponse($inscription, 'Ressource trouvée');
        } catch (Exception $e) {
            return $this->errorResponse('Ressource non trouvée', 404, $e->getMessage());
        }
    }

    /**
     * Récupère les données utiles pour les formulaires (ex : listes déroulantes).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getformdetails()
    {
        try {
            $formations = Formation::all();
            $users = User::all();

            return $this->successResponse([
                'formations' => $formations,
                'users' => $users,
            ], 'Données du formulaire récupérées avec succès');
        } catch (Exception $e) {
            return $this->errorResponse('Erreur lors de la récupération des données du formulaire', 500, $e->getMessage());
        }
    }
}
