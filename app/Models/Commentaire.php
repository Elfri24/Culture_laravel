<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';

    protected $fillable = ['texte','note','date','utilisateur_id','contenu_id'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'contenu_id');
    }
}