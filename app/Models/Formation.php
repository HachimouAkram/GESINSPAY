<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['nom', 'description', 'prix_inscription', 'prix_mensuel', 'duree', 'niveau', 'date_debut'];

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'inscriptions', 'formation_id', 'utilisateur_id');
    }

}
