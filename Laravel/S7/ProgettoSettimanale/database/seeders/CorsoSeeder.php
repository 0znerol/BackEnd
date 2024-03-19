<?php

namespace Database\Seeders;

use App\Models\Corso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CorsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Corso::factory(4)->create();
    }
}
