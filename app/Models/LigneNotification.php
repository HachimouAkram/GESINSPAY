<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LigneNotification extends Model
{
    protected $fillable = ['notification_id', 'utilisateur_id', 'date', 'lu'];

    /*public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }

}

