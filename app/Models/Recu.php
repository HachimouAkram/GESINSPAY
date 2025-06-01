<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recu extends Model
{
    protected $fillable = ['montant', 'date_emmission', 'fichier_pdf', 'numero', 'paiement_id'];

    public function paiement() {
        return $this->belongsTo(Payement::class);}

}
