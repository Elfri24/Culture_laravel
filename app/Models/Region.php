<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $fillable = ['nom_region', 'description', 'population', 'superficie', 'localisation'];

    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'region_id');
    }

    public function langues()
    {
        return $this->belongsToMany(Langue::class, 'parler', 'region_id', 'langue_id');
    }
}