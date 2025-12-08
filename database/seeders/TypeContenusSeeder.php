<?php

namespace Database\Seeders;

use App\Models\TypeContenu;
use Illuminate\Database\Seeder; // Nom du modèle corrigé (pas de underscore)

class TypeContenusSeeder extends Seeder
{
    public function run(): void
    {
        // Utilisation de insert() pour insérer plusieurs enregistrements d'un coup
        TypeContenu::create(
            ['nom_contenu' => 'Article']);
        TypeContenu::create(
            ['nom_contenu' => 'Vidéo']);
        TypeContenu::create(
            ['nom_contenu' => 'Livre']);

        TypeContenu::create(
            ['nom_contenu' => 'Cours']
        );
        TypeContenu::create(
            ['nom_contenu' => 'Podcast']
        );
    }
}
