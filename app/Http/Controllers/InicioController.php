<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function index()
    {
        return view('inicio');
    }
    public function obtenerDatos()
    {
        $profesores = [        ['hora' => '9:00 AM', 'entradas' => 5],
            ['hora' => '10:00 AM', 'entradas' => 10],
            ['hora' => '11:00 AM', 'entradas' => 15],
            // Agrega más datos aquí
        ];

        $directores = [        ['hora' => '9:00 AM', 'entradas' => 3],
            ['hora' => '10:00 AM', 'entradas' => 6],
            ['hora' => '11:00 AM', 'entradas' => 9],
            // Agrega más datos aquí
        ];

        return response()->json(['profesores' => $profesores, 'directores' => $directores]);
    }

}
