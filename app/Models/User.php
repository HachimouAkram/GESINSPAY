<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'type_profil'
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'utilisateur_id');
    }

    public function paiements() {
        return $this->hasMany(Payement::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }

    public function documents() {
        return $this->hasOne(Document::class);
    }
    public function lignesNotifications()
    {
        return $this->hasMany(LigneNotification::class, 'utilisateur_id');
    }
    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'inscriptions', 'utilisateur_id', 'formation_id');
    }





    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
