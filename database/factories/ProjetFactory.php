<?php

namespace Database\Factories;

use App\Models\Projet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projet>
 */
class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Projet::class;
    public function definition(): array
    {
         // Sélectionner un "worker" aléatoire de la table "users"
         $worker = User::where('type', 'worker')->inRandomOrder()->first();

         return [
             'nom' => $this->faker->sentence(3),
             'description' => $this->faker->paragraph,
             'date_fin' => $this->faker->date(),
             'statut' => $this->faker->randomElement(['en cours', 'terminé']),
             'worker_id' => $worker ? $worker->id : User::first()->id,
         ];
    }
}
