<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notification extends Model
{
    protected $fillable = ['message', 'type_message', 'date_envois'];

    public function ligneNotifications(): HasMany
    {
        return $this->hasMany(LigneNotification::class, 'notification_id');
    }
    public function lignesNotifications()
    {
        return $this->hasMany(LigneNotification::class, 'notification_id');
    }
    public function lignes() {
        return $this->hasMany(\App\Models\LigneNotification::class);
    }


}
