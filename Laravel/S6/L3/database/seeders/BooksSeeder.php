<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(array $formData = null): void
    {
        if ($formData) {
            Book::factory()->fromForm($formData)->create();
        } else {
            Book::factory(10)->create();
        }
    }
}
