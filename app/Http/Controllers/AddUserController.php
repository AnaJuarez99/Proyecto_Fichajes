<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nombre' => ['required', 'string', 'max:30'],
            'apellidos' => ['required', 'string', 'max:30'],
            'dni' => ['required', 'string', 'size:9', 'unique:users'],
            'telefono' => ['required', 'string', 'size:9'],
            'puesto' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    User::create([
        'nombre' => $request->nombre,
        'apellidos' => $request->apellidos,
        'dni' => $request->dni,
        'telefono' => $request->telefono,
        'puesto' => $request->puesto,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('historial')->with('mensaje', 'Se ha registrado el usuario correctamente');
}

}
