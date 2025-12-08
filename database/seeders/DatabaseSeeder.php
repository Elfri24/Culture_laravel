<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Méthode appelée pour lancer les seeders
     */
    public function run(): void
    {
        // Appel des seeders dans l'ordre souhaité
        $this->call([
            RolesSeeder::class,
            RegionsSeeder::class,
            LanguesSeeder::class,
            TypeMediasSeeder::class,
            TypeContenusSeeder::class,
            UtilisateursSeeder::class,
            ContenusSeeder::class,
            MediasSeeder::class,

        ]);
    }
}
