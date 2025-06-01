<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use App\Models\Payement;
use Exception;

class PayementController extends Controller
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
            $data = Payement::all();
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
            $payement = new Payement();
            $payement->montant = $request->montant;
            $payement->date = $request->date;
            $payement->mode_paiement = $request->mode_paiement;
            $payement->type_paiement = $request->type_paiement;
            $payement->user_id = $request->user_id;
            if ($payement->save()) {
                return $this->successResponse($payement, 'Récupération réussie');
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
            $payement = Payement::findOrFail($id);
            $payement->montant = $request->montant;
            $payement->date = $request->date;
            $payement->mode_paiement = $request->mode_paiement;
            $payement->type_paiement = $request->type_paiement;
            $payement->user_id = $request->user_id;
            if ($payement->save()) {
                return $this->successResponse($payement, 'Mise à jour réussie');
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
            $payement = Payement::findOrFail($id);
            if ($payement->delete()) {
                return $this->successResponse($payement, 'Suppression réussie');
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
            $payement = Payement::findOrFail($id);
             return $this->successResponse($payement, 'Ressource trouvée');
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