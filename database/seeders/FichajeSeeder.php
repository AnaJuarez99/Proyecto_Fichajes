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
        //Fichaje::factory(30)->create();
        $dias = Carbon::now()->endOfDay()->day;

        for ($i = 1; $i <= $dias ; $i++) { 
            $fichaje = new Fichaje();
            $fichaje->id_usuario = 1;
            $fichaje->fecha = Carbon::createFromFormat('Y-m-d', '2023-05-' . $i);
            $fichaje->hora_entrada = Carbon::createFromFormat('H:i:s', '08:00:00');
            $fichaje->localizacion_entrada = 'Casa';
            $fichaje->hora_salida = Carbon::createFromFormat('H:i:s', '15:00:00');
            $fichaje->localizacion_salida = 'Casa';
            $fichaje->horas = 7;

            $fichaje->save();
        }
    }
}
