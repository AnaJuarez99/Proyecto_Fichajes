<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Fichaje;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{

    public function index()
    {
        if (Auth::user()->type === 1) {
            return view("historial")->with(["usuarios" => User::where('id', '!=', Auth::id())->get(), "usuario" => Auth::user()]);
        }

        return view('inicio');
    }

    public function fichar(Request $request) {
        $fichaje = Fichaje::where('fecha', Carbon::now()->format('Y-m-d'))->where('id_usuario', Auth::user()->id)->first();

        if (!$fichaje) {
            $fichaje = Fichaje::create([
            'id_usuario' => Auth::user()->id,
            'fecha' => Carbon::now()->format('Y-m-d'),
            'hora_entrada' => Carbon::now('Europe/Madrid')->format('H:i:s'),
            'localizacion_entrada' => $request->address,
            'hora_salida' => null,
            'localizacion_salida' => null,
            'horas' => null
            ]);

            return redirect()->route('inicio')->with('mensaje', 'Se ha registrado su entrada correctamente.');
        }

        elseif ($fichaje->hora_salida === null) {
            $fichaje->hora_salida = Carbon::now('Europe/Madrid')->format('H:i:s');
            $fichaje->localizacion_salida = $request->address;

            $diferencia = Carbon::parse($fichaje->hora_salida)->diff(Carbon::parse($fichaje->hora_entrada));

            $horas = $diferencia->h; // Agrega los minutos convertidos a horas

            $fichaje->horas = $horas;

            $fichaje->save();

            return redirect()->route('inicio')->with('mensaje', 'Se ha registrado su salida correctamente.');
        }

        return redirect()->route('inicio')->with('mensaje', 'Ya ha registrado su entrada y salida del día de hoy.');
    }
}