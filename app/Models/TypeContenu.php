<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeContenu extends Model
{
    protected $table = 'type_contenus';

    protected $fillable = ['nom_contenu'];

    public function contenus()
    {
        return $this->hasMany(Contenu::class, 'type_contenu_id');
    }
}