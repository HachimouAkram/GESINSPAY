<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use App\Models\Formation;
use Exception;

class FormationController extends Controller
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
            $formations = Formation::all();
            return view('formations.index', compact('formations'));
        } catch (Exception $e) {
            return redirect()->route('formations.index')->with('error', 'Récupération échouée');
        }
    }

    public function inde()
    {
        try {
            $data = Formation::all();
            return $this->successResponse($data, 'Récupération réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Récupération échouée', 500, $e->getMessage());
        }
    }

    public function create()
    {
        return view('formations.create');
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'duree' => 'required|integer|min:1',
        'prix_inscription' => 'required|numeric|min:0',
        'prix_mensuel' => 'required|numeric|min:0',
        'date_debut' => 'required|date|after_or_equal:today',
        'niveau' => 'required|integer|min:1',
    ]);

    Formation::create($validated);

    return redirect()->route('formations.index')->with('success', 'Formation ajoutée avec succès.');
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
            $formation = Formation::findOrFail($id);
            $formation->nom = $request->nom;
            $formation->description = $request->description;
            $formation->prix_inscription = $request->prix_inscription;
            $formation->prix_mensuel = $request->prix_mensuel;
            $formation->duree = $request->duree;
            $formation->niveau = $request->niveau;
            if ($formation->save()) {
                return $this->successResponse($formation, 'Mise à jour réussie');
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
            $formation = Formation::findOrFail($id);
            if ($formation->delete()) {
                return $this->successResponse($formation, 'Suppression réussie');
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
            $formation = Formation::findOrFail($id);
             return $this->successResponse($formation, 'Ressource trouvée');
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

    public function edit($id)
    {
        try {
            $formation = Formation::findOrFail($id);
            return view('formations.edit', compact('formation'));
        } catch (Exception $e) {
            return redirect()->route('formations.index')->with('error', 'Formation non trouvée');
        }
    }

}
