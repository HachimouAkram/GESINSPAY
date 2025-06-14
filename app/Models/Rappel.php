<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rappel extends Model
{
    protected $fillable = ['date', 'texte'];

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
