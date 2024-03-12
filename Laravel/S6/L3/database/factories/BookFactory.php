<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

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
        $author_id = Author::inRandomOrder()->first()->id;
        return [
            'title' => $this->faker->unique()->text(50),
            'author_id' => $author_id,
            'author_name' => Author::find($author_id)->name,
            'category' => $this->faker->text(5),
            'relesed' => $this->faker->date(),
            'created_at' => $this->faker->datetime(),
        ];
    }

    public function fromForm(array $data): static
    {
        return $this->state($data);
    }
}
