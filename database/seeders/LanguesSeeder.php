<?php

namespace Database\Seeders;

use App\Models\Langue;
use Illuminate\Database\Seeder;

class LanguesSeeder extends Seeder
{
    public function run(): void
    {
        Langue::create([
            'nom_langue' => 'Français',
            'code_langue' => 'fr',
            'description' => 'Langue française',
        ]);
        Langue::create([
            'nom_langue' => 'Anglais',
            'code_langue' => 'en',
            'description' => 'English language',
        ]);
        Langue::create([
            'nom_langue' => 'Fon',
            'code_langue' => 'fon',
            'description' => 'Langue fon',
        ]);
        Langue::create([
            'nom_langue' => 'Yoruba',
            'code_langue' => 'yo',
            'description' => 'Langue yoruba',
        ]);
        Langue::create([
            'nom_langue' => 'Goun',
            'code_langue' => 'gou',
            'description' => 'Langue goun',
        ]);
    }
}