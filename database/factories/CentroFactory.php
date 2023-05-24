<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'direccion' => Str::limit(fake()->address(), 30),
            'ciudad' => fake()->city(),
            'provincia' => fake()->state(),
            'cp' => fake()->numberBetween(10000, 99999)
        ];
    }
}
