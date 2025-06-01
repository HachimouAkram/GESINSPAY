<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensualite extends Model
{
    protected $fillable = ['date', 'montant', 'payer', 'inscription_id'];
    public function paiement() {
        return $this->hasMany(Payement::class);}

    public function inscription()
    {
        return $this->belongsTo(Inscription::class, 'inscription_id');
    }

}
