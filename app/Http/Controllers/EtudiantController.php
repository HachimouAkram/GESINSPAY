<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use app\Http\Controllers\UserController;
use App\Models\Etudiant;
use Exception;

class EtudiantController extends Controller
{
    use GenerateApiResponse;

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $data = Etudiant::all();
            return $this->successResponse($data, 'Récupération réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Récupération échouée', 500, $e->getMessage());
        }
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
            $etudiant = new Etudiant();
            $etudiant->matricule = $request->matricule;
            $etudiant->formation_inscrit = $request->formation_inscrit;
            $etudiant->niveau = $request->niveau;
            if ($etudiant->save()) {
                return $this->successResponse($etudiant, 'Récupération réussie');
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
            $etudiant = Etudiant::findOrFail($id);
            $etudiant->matricule = $request->matricule;
            $etudiant->formation_inscrit = $request->formation_inscrit;
            $etudiant->niveau = $request->niveau;
            if ($etudiant->save()) {
                return $this->successResponse($etudiant, 'Mise à jour réussie');
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
            $etudiant = Etudiant::findOrFail($id);
            if ($etudiant->delete()) {
                return $this->successResponse($etudiant, 'Suppression réussie');
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
            $etudiant = Etudiant::findOrFail($id);
             return $this->successResponse($etudiant, 'Ressource trouvée');
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

    public function mesInscriptions()
    {
        $user = Etudiant::all(); // ou autre méthode pour identifier l'étudiant
        $inscriptions = $user->inscriptions()->with('document')->get()->groupBy('statut');

        return view('etudiant.inscriptions', compact('inscriptions'));
    }
}
