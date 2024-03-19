<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Corso>
 */
class CorsoFactory extends Factory
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
            'orari' => 'Martedi e Giovedi-14:00-16:00 Venerdi-16:00-18:00',
        ];
    }
}
