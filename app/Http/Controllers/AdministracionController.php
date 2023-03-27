<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class AdministracionController extends Controller
{

    public function index()
    {
        return view('administracion');
    }

    public function showProfile()
{
   // $user = Auth::user(); // Obtener el usuario actualmente autenticado
    return view('administracion', );//compact('user') // Pasar el usuario a la vista
}

public function updateProfile(Request $request)
{
    $user = Auth::user(); // Obtener el usuario actualmente autenticado

    // Validar los campos enviados en el formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dni' => 'required|string|max:9|unique:users,dni,'.$user->id,
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Actualizar los campos del usuario
    $user->nombre = $request->nombre;
    $user->apellidos = $request->apellidos;
    $user->dni = $request->dni;
    $user->email = $request->email;

    // Actualizar la foto de perfil si se ha subido una nueva
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = time() . '_' . $foto->getClientOriginalName();
        Storage::putFileAs('public/fotos', $foto, $filename);
        $user->foto = $filename;
    }

    // Guardar los cambios en la base de datos
    $user->save();

    return redirect()->route('administracion')->with('success', 'Perfil actualizado exitosamente.');
}


}
