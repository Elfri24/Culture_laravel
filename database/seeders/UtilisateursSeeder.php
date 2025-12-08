<?php

namespace Database\Seeders;

use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UtilisateursSeeder extends Seeder
{
    public function run(): void
    {
        Utilisateur::create([

            'nom' => 'AVALIGBE',
            'prenom' => 'Elfrieda',
            'email' => 'avaligbeelfrieda@gmail.com',
            'mot_de_passe' => Hash::make('Fridlaravel'),
            'role_id' => 1,
            'langue_id' => 1,
        ]);
        Utilisateur::create([

            'nom' => 'SONON',
            'prenom' => 'Keith',
            'email' => 'keith@example.com',
            'mot_de_passe' => Hash::make('password123'),
            'role_id' => 2,
            'langue_id' => 1,
        ]);

        Utilisateur::create([
            'nom' => 'KOFFI',
            'prenom' => 'Marie',
            'email' => 'marie@example.com',
            'mot_de_passe' => Hash::make('password123'),
            'role_id' => 3,
            'langue_id' => 1,
        ]);

        Utilisateur::create([
            'nom' => 'AZON',
            'prenom' => 'Kevin',
            'email' => 'kevin@example.com',
            'mot_de_passe' => Hash::make('password123'),
            'role_id' => 4,
            'langue_id' => 1,
        ]);

        Utilisateur::create([
            'nom' => 'COMLAN',
            'prenom' => 'Maurice',
            'email' => 'maurices.comlan@gmail.com',
            'mot_de_passe' => Hash::make('Eneam123'),
            'role_id' => 1,
            'langue_id' => 1,

        ]);
    }
}
