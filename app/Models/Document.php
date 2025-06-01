<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    // Constantes de statuts
    public const STATUT_EN_ATTENTE = 'en_attente';
    public const STATUT_VALIDÉ = 'valide';
    public const STATUT_REJETÉ = 'rejeté';

    protected $fillable = [
        'attestation_bac',
        'releve_note_bac',
        'bulletin_note1',
        'bulletin_note2',
        'bulletin_note3',
        'derniere_diplome_acquis',
        'piece_identite',
        'certificat_naissance',
        'date_soumission',
        'statut_validation',
        'inscription_id',
    ];

    // Champs à caster automatiquement
    protected $casts = [
        'date_soumission' => 'datetime',
    ];

    // Champs reconnus comme des dates
    protected $dates = [
        'date_soumission',
    ];

    /**
     * Relation : Un document appartient à une inscription
     */
    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }
}
