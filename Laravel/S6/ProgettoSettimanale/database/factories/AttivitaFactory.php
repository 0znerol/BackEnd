<?php

namespace Database\Factories;

use App\Models\Attivita;
use App\Models\Progetto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attivita>
 */
class AttivitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'thumb' => $this->faker->imageUrl(),
            'progetto_id' => Progetto::inRandomOrder()->first()->id
        ];
    }
}
