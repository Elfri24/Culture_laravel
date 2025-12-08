<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    protected $table = 'langues';

    protected $fillable = ['nom_langue', 'code_langue', 'description'];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'langue_id');
    }

    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'langue_id');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'parler', 'langue_id', 'region_id');
    }
}