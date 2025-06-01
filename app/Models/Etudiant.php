<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends User
{
    protected $fillable = ['matricule', 'niveau'];

    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }

    public function payements() {
        return $this->hasMany(Payement::class);
    }

}
