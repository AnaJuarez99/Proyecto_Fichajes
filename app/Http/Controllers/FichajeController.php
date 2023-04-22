<?php

namespace App\Http\Controllers;

use App\Models\Fichaje;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FichajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_usuario' => ['required', 'integer'],
            'fecha' => ['required', 'date'],
            'hora_inicio' => ['required', 'timestamp'],
            'hora_fin' => ['required', 'timestamp'],
            'localizacion' => ['required', 'string', 'max:30']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(array $data)
    {
        return Fichaje::create([
            'id_usuario' => $data['id_usuario'],
            'fecha' => $data['fecha'],
            'hora_inicio' => $data['hora_inicio'],
            'hora_fin' => $data['hora_fin'],
            'localizacion' => $data['localizacion']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fichaje $fichaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fichaje $fichaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fichaje $fichaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fichaje $fichaje)
    {
        //
    }
}
