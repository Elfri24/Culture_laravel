<?php

namespace Database\Seeders;

use App\Models\TypeMedia;
use Illuminate\Database\Seeder;

class TypeMediasSeeder extends Seeder
{
    public function run(): void
    {
        TypeMedia::create(
            ['nom_media' => 'Image']);
        TypeMedia::create(
            ['nom_media' => 'Vidéo']);
        TypeMedia::create(
            ['nom_media' => 'Audio']);
        TypeMedia::create(
            ['nom_media' => 'Document']);
        TypeMedia::create(
            ['nom_media' => 'Lien']);
    }
}
