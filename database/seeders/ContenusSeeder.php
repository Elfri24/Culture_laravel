<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contenu;

class ContenusSeeder extends Seeder
{
    public function run(): void
    {
        Contenu::create([
            
                'titre' => 'Introduction Laravel',
                'texte' => 'Introduction complète sur Laravel framework.',
                'date_creation' => now()->subDays(10),
                'statut' => 'publié',
                'parent_id' => null,
                'date_validation' => now()->subDays(8),
                'region_id' => 1,
                'langue_id' => 1,
                'moderateur_id' => null,
                'type_contenu_id' => 1,
                'auteur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
           Contenu::create( [
                'titre' => 'Tutoriel Flutter',
                'texte' => 'Tutoriel détaillé pour apprendre Flutter.',
                'date_creation' => now()->subDays(9),
                'statut' => 'brouillon',
                'parent_id' => null,
                'date_validation' => null,
                'region_id' => 1,
                'langue_id' => 1,
                'moderateur_id' => null,
                'type_contenu_id' => 2,
                'auteur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
           Contenu::create([
                'titre' => 'Podcast DevOps',
                'texte' => 'Podcast sur les pratiques DevOps modernes.',
                'date_creation' => now()->subDays(5),
                'statut' => 'publié',
                'parent_id' => null,
                'date_validation' => now()->subDays(3),
                'region_id' => 2,
                'langue_id' => 2,
                'moderateur_id' => 3,
                'type_contenu_id' => 3,
                'auteur_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
           Contenu::create([
                'titre' => 'Manuel SQL',
                'texte' => 'Manuel complet pour apprendre SQL.',
                'date_creation' => now()->subDays(15),
                'statut' => 'publié',
                'parent_id' => null,
                'date_validation' => now()->subDays(10),
                'region_id' => 1,
                'langue_id' => 1,
                'moderateur_id' => 1,
                'type_contenu_id' => 4,
                'auteur_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

              Contenu::create(
            [
                'titre' => 'Cours React',
                'texte' => 'Cours complet sur ReactJS pour débutants.',
                'date_creation' => now()->subDays(7),
                'statut' => 'publié',
                'parent_id' => null,
                'date_validation' => now()->subDays(5),
                'region_id' => 1,
                'langue_id' => 1,
                'moderateur_id' => 2,
                'type_contenu_id' => 5,
                'auteur_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
 
        
    }
}