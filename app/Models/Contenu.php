<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    protected $table = 'contenus';

    protected $fillable = [
        'titre','texte','date_creation','statut','parent_id','date_validation',
        'region_id','langue_id','moderateur_id','type_contenu_id','auteur_id'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'langue_id');
    }

    public function type()
    {
        return $this->belongsTo(TypeContenu::class, 'type_contenu_id');
    }

    public function auteur()
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    public function moderateur()
    {
        return $this->belongsTo(Utilisateur::class, 'moderateur_id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'contenu_id');
        
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'contenu_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function enfants()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    


}