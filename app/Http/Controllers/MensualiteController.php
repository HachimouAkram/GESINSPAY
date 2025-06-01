<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Mensualite;
use Exception;

class MensualiteController extends Controller
{
    use GenerateApiResponse;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = Auth::user();

        // On récupère toutes les mensualités liées aux inscriptions de l'utilisateur,
        // avec la formation associée (via la relation inscription->formation).
        $mensualites = Mensualite::with(['inscription.formation'])
            ->whereHas('inscription', function($q) use ($user) {
                $q->where('utilisateur_id', $user->id);
            })
            ->orderBy('date')
            ->get();

        // Groupement par "nom de formation + niveau"
        $mensualitesParFormation = $mensualites->groupBy(function ($mensualite) {
            $formation = $mensualite->inscription->formation;
            return $formation->nom . ' - ' . strtoupper($formation->niveau); // ex: GL - 1
        });

        return view('mensualites.index', compact('mensualitesParFormation'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $mensualite = new Mensualite();
            $mensualite->date = $request->date;
            $mensualite->payement_id = $request->payement_id;
            if ($mensualite->save()) {
                return $this->successResponse($mensualite, 'Récupération réussie');
            }
        } catch (Exception $e) {
            return $this->errorResponse('Insertion échouée', 500, $e->getMessage());
        }
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $mensualite = Mensualite::findOrFail($id);
            $mensualite->date = $request->date;
            $mensualite->payement_id = $request->payement_id;
            if ($mensualite->save()) {
                return $this->successResponse($mensualite, 'Mise à jour réussie');
            }
        } catch (Exception $e) {
            return $this->errorResponse('Mise à jour échouée', 500, $e->getMessage());
        }
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $mensualite = Mensualite::findOrFail($id);
            if ($mensualite->delete()) {
                return $this->successResponse($mensualite, 'Suppression réussie');
            }
        } catch (Exception $e) {
            return $this->errorResponse('Suppression échouée', 500, $e->getMessage());
        }
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $mensualite = Mensualite::findOrFail($id);
             return $this->successResponse($mensualite, 'Ressource trouvée');
        } catch (Exception $e) {
            return $this->errorResponse('Ressource non trouvée', 404, $e->getMessage());
        }
    }

        /**
     * Get related form details for foreign keys.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getformdetails()
    {
        try {

            return $this->successResponse([

            ], 'Données du formulaire récupérées avec succès');
        } catch (Exception $e) {
            return $this->errorResponse('Erreur lors de la récupération des données du formulaire', 500, $e->getMessage());
        }
    }
}
