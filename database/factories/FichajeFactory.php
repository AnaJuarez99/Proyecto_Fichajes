<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fichaje>
 */
class FichajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_usuario' => User::all()->random()->id,
            'fecha' => fake()->date(),
            'hora_entrada' => fake()->time(),
            'localizacion_entrada' => fake()->address(),
            'hora_salida' => fake()->time(),
            'localizacion_salida' => fake()->address()
        ];
    }
}
