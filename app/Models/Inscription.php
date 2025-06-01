<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = ['date', 'statut', 'utilisateur_id', 'formation_id', 'payer'];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }


    public function formation() {
        return $this->belongsTo(Formation::class, 'formation_id');
    }
    public function payement()
    {
        return $this->hasMany(Payement::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class, 'inscription_id');
    }



}
