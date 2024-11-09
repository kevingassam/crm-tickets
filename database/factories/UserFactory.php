<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telephone' => $this->faker->phoneNumber,
            'email_verified_at' => now(),
            'type' => 'client',  // Valeur par défaut, à changer dans le seeder
            'avatar' => $this->faker->imageUrl(200, 200),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }


    public function admin()
    {
        return $this->state([
            'type' => 'admin',
        ]);
    }

    public function worker()
    {
        return $this->state([
            'type' => 'worker',
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
