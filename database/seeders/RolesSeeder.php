<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['nom_role' => 'Administrateur']);
        Role::create(['nom_role' => 'Rédacteur']);
        Role::create(['nom_role' => 'Utilisateur']);
        Role::create(['nom_role' => 'Visiteur']);
        Role::create(['nom_role' => 'Manager']);
    }
}