<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    protected $fillable = ['montant', 'date', 'mode_paiement', 'user_id', 'formation_id', 'mensualite_id'];

    public function utilisateur() {
        return $this->belongsTo(User::class);
    }

    public function recu() {
        return $this->hasOne(Recu::class);
    }

    public function mensuel() {
        return $this->hasOne(Mensualite::class);
    }
    public function inscription() {
        return $this->hasOne(Inscription::class);
    }

}
