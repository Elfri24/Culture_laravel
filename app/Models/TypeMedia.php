<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMedia extends Model
{
    protected $table = 'type_medias';

    protected $fillable = ['nom_media'];

    public function medias()
    {
        return $this->hasMany(Media::class, 'type_media_id');
    }
}