<?php

namespace Database\Factories;

use App\Models\Corso;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prenotazione>
 */
class PrenotazioneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'corso_id' => Corso::inRandomOrder()->first()->id,
            'stato' => $this->faker->randomElement(['in attesa', 'confermata', 'annullata']),
            'orario' => $this->faker->randomElement(['09:00', '14:00', '18:00', '20:00'])
        ];
    }
}
