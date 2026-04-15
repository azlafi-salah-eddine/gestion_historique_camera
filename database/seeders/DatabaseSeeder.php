<?php

namespace Database\Seeders;

use App\Models\Userr;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Userr::factory(10)->create();

        Userr::factory()->create([
            'Nom_u' => 'Test',
            'Prenom_u' => 'User',
            'username' => 'testuser',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
