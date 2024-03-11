<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->text(50),
            'author' => $this->faker->text(20),
            'category' => $this->faker->text(5),
            'created_at' => $this->faker->datetime(),
        ];
    }

    public function fromForm(array $data): static
    {
        return $this->state($data);
    }
}
