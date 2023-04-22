<?php

namespace Database\Seeders;

use App\Models\Fichaje;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FichajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fichaje::factory()->count(10)->create();
    }
}
