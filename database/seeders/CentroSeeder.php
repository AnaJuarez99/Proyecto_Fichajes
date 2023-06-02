<?php

namespace Database\Seeders;

use App\Models\Centro;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CentroSeeder extends Seeder
{
    protected $priority = 1;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Centro::factory(5)->create();
    }
}
