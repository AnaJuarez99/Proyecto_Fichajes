<?php

namespace Database\Factories;

use App\Models\Centro;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
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
        $currentDate = Carbon::now();
        $currentDay = $currentDate->day;
        $currentMonth = $currentDate->month;
    
        $randomDay = fake()->numberBetween(1, $currentDay - 1);
        $randomMonth = $currentMonth;
    
        $randomDate = Carbon::createFromDate(null, $randomMonth, $randomDay);
        $randomTime = fake()->time();
    
        $randomEntryTime = Carbon::createFromFormat('H:i:s', $randomTime);
        $randomExitTime = $randomEntryTime->copy()->addHours(fake()->numberBetween(1, 10));
    
        $hourDifference = $randomExitTime->diffInHours($randomEntryTime);
    
        return [
            'id_usuario' => User::all()->random()->id,
            'fecha' => $randomDate->toDateString(),
            'hora_entrada' => $randomEntryTime->format('H:i:s'),
            'localizacion_entrada' => Centro::all()->random()->direccion,
            'hora_salida' => $randomExitTime->format('H:i:s'),
            'localizacion_salida' => Centro::all()->random()->direccion,
            'horas' => $hourDifference
        ];
    }    

}
