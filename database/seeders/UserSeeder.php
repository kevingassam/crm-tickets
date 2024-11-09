<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un utilisateur admin
        User::factory()->admin()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        // Créer un utilisateur client
        User::factory()->create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'type' => 'client',
        ]);

        // Créer un utilisateur worker
        User::factory()->worker()->create([
            'name' => 'Worker User',
            'email' => 'worker@example.com',
            'type' => 'worker',
        ]);
    }
}
