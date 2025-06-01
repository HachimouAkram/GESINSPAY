<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\GenerateApiResponse;
use App\Models\Document;
use App\Models\Inscription;
use Exception;

class DocumentController extends Controller
{
    use GenerateApiResponse;

    /**
     * Liste tous les documents.
     */
    public function index()
    {
        try {
            $documents = Document::all();
            return $this->successResponse($documents, 'Récupération réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Récupération échouée', 500, $e->getMessage());
        }
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create(Request $request)
    {
        $inscriptionId = $request->query('inscription_id'); // récupère le paramètre inscription_id depuis l'URL

        // tu peux récupérer l'inscription si besoin
        $inscription = Inscription::find($inscriptionId);

        return view('documents.create', compact('inscriptionId', 'inscription'));
    }


    /**
     * Stocke un nouveau document.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'attestation_bac' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'releve_note_bac' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'bulletin_note1' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'bulletin_note2' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'bulletin_note3' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'derniere_diplome_acquis' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'piece_identite' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'certificat_naissance' => 'required|file|mimes:pdf,jpg,png|max:2048',
                'inscription_id' => 'required|numeric|exists:inscriptions,id',
            ]);

            // Upload des fichiers
            $paths = [];
            foreach ([
                'attestation_bac', 'releve_note_bac', 'bulletin_note1',
                'bulletin_note2', 'bulletin_note3', 'derniere_diplome_acquis',
                'piece_identite', 'certificat_naissance'
            ] as $file) {
                $paths[$file] = $request->file($file)->store('documents', 'public');
            }

            $document = Document::create([
                'attestation_bac'          => $paths['attestation_bac'],
                'releve_note_bac'          => $paths['releve_note_bac'],
                'bulletin_note1'           => $paths['bulletin_note1'],
                'bulletin_note2'           => $paths['bulletin_note2'],
                'bulletin_note3'           => $paths['bulletin_note3'],
                'derniere_diplome_acquis'  => $paths['derniere_diplome_acquis'],
                'piece_identite'           => $paths['piece_identite'],
                'certificat_naissance'     => $paths['certificat_naissance'],
                'date_soumission'          => now(),
                // Optionnel : si tu as défini la constante, utilise-la sinon laisse 'en_attente'
                'statut_validation'        => Document::STATUT_EN_ATTENTE,
                'inscription_id'           => $request->inscription_id,
            ]);

            return response()->json([
                'status_message' => 'Document créé avec succès',
                'document' => $document,
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'status_message' => 'Erreur serveur',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Affiche les détails d’un document.
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.show', compact('document'));
    }

    /**
     * Met à jour un document.
     */
    public function update(Request $request, $id)
    {
        try {
            $document = Document::findOrFail($id);

            $document->update($request->only([
                'attestation_bac', 'releve_note_bac', 'bulletin_note1',
                'bulletin_note2', 'bulletin_note3', 'derniere_diplome_acquis',
                'piece_identite', 'certificat_naissance',
                'date_soumission', 'statut_validation', 'inscription_id'
            ]));

            return $this->successResponse($document, 'Mise à jour réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Mise à jour échouée', 500, $e->getMessage());
        }
    }

    /**
     * Supprime un document.
     */
    public function destroy($id)
    {
        try {
            $document = Document::findOrFail($id);
            $document->delete();
            return $this->successResponse($document, 'Suppression réussie');
        } catch (Exception $e) {
            return $this->errorResponse('Suppression échouée', 500, $e->getMessage());
        }
    }

    /**
     * Récupère les données pour les formulaires (ex: dropdowns).
     */
    public function getformdetails()
    {
        try {
            return $this->successResponse([
                'inscriptions' => Inscription::all(),
            ], 'Données du formulaire récupérées avec succès');
        } catch (Exception $e) {
            return $this->errorResponse('Erreur lors de la récupération des données du formulaire', 500, $e->getMessage());
        }
    }

    //visionnage de document d un etudiant
    public function showForStudent($inscriptionId)
    {
        $document = Document::where('inscription_id', $inscriptionId)->firstOrFail();

        return view('documents.show_student', compact('document'));
    }

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function editChamp(Document $document, $champ)
    {
        $champ = strtolower($champ);
        $champsAutorises = [
            'attestation_bac', 'releve_note_bac', 'bulletin_note1', 'bulletin_note2', 'bulletin_note3',
            'derniere_diplome_acquis', 'piece_identite', 'certificat_naissance'
        ];

        if (!in_array($champ, $champsAutorises)) {
            abort(404);
        }

        return view('documents.edit_champ', compact('document', 'champ'));
    }


    public function updateChamp(Request $request, Document $document, $champ)
    {
        $champsAutorises = [
            'attestation_bac', 'releve_note_bac', 'bulletin_note1', 'bulletin_note2', 'bulletin_note3',
            'derniere_diplome_acquis', 'piece_identite', 'certificat_naissance'
        ];

        if (!in_array($champ, $champsAutorises)) {
            abort(404);
        }

        $request->validate([
            'fichier' => 'required|file|max:5120' // max 5MB
        ]);

        $fichier = $request->file('fichier')->store('documents', 'public');

        $document->$champ = $fichier;
        $document->save();

        return redirect()->route('documents.show', $document->id)->with('success', 'Document mis à jour avec succès.');
    }



}
