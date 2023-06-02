<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Fichaje;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FichajeSeeder extends Seeder
{
    protected $priority = 3;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fichaje::factory(50)->create();
    }
}
