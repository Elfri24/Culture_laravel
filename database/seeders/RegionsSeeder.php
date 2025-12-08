<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionsSeeder extends Seeder
{
    public function run(): void
    {
        // Utiliser insert() pour insérer plusieurs lignes en une seule requête
        Region::create([
               'nom_region' => 'Atlantique',
                'description' => 'Description pour Atlantique',
                'population' => 700000,
                'superficie' => 3000,
                'localisation' => 'Sud',
        ]);
           Region::create([
                'nom_region' => 'Littoral',
                'description' => 'Description pour Littoral',
                'population' => 1200000,
                'superficie' => 2000,
                'localisation' => 'Sud-Ouest',
            ]);
            Region::create([
                'nom_region' => 'Mono',
                'description' => 'Description pour Mono',
                'population' => 400000,
                'superficie' => 2500,
                'localisation' => 'Sud-Est',
            ]);
            Region::create([
                'nom_region' => 'Ouémé',
                'description' => 'Description pour Ouémé',
                'population' => 800000,
                'superficie' => 2700,
                'localisation' => 'Sud-Est',
            ]);
            Region::create([
                'nom_region' => 'Zou',
                'description' => 'Description pour Zou',
                'population' => 650000,
                'superficie' => 2900,
                'localisation' => 'Centre',
            ]);
    }
}