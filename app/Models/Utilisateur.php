<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom','prenom','email','mot_de_passe','sexe',
        'date_inscription','date_naissance','statut','photo',
        'role_id','langue_id'
    ];

    protected $hidden = ['mot_de_passe','remember_token'];

    // Mutator automatique pour hacher le mot de passe
    public function setMotDePasseAttribute($value)
    {
        if ($value === null) return;
        // Evite double hashing si déjà hashé (basic check)
        if (password_get_info($value)['algo'] === 0) {
            $this->attributes['mot_de_passe'] = Hash::make($value);
        } else {
            $this->attributes['mot_de_passe'] = $value;
        }
    }

    // Mapper pour être compatible avec auth (optional)
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'langue_id');
    }

    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'auteur_id');
    }

    public function contenusModeres()
    {
        return $this->hasMany(Contenu::class, 'moderateur_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'utilisateur_id');
    }
}