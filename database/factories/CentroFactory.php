<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Centro>
 */
class CentroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coordenadas' => fake()->latitude() . ', ' . fake()->longitude(),
            'ciudad' => fake()->city(),
            'cp' => fake()->numberBetween(10000, 99999)
        ];
    }
}
