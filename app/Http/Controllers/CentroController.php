<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'coordenadas' => ['required', 'string', 'max:30'],
            'ciudad' => ['required', 'string', 'max:30'],
            'cp' => ['required', 'number', 'size:5']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(array $data)
    {
        return Centro::create([
            'coordenadas' => $data['coordenadas'],
            'ciudad' => $data['ciudad'],
            'cp' => $data['cp']
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
    public function show(Centro $centro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centro $centro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centro $centro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centro $centro)
    {
        //
    }
}
