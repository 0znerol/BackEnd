<?php

namespace Database\Seeders;

use App\Models\Prenotazione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrenotazioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prenotazione::factory(4)->create();
    }
}
