<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        'nombre' => ['nullable', 'string', 'max:30'],
        'apellidos' => ['nullable', 'string', 'max:30'],
        'dni' => ['nullable', 'string', 'size:9', 'unique:users'],
        'telefono' => ['nullable', 'string', 'size:9'],
        'puesto' => ['nullable', 'string', 'max:50']
    ]);    

    // Actualizar los campos del usuario si se han enviado valores en el formulario
    $updated = false;
    foreach ($request->all() as $key => $value) {
        if ($value && isset($user->$key)) {
            $user->$key = $value;
            $updated = true;
        }
    }

    // Guardar los cambios en la base de datos si se ha actualizado algún campo
    if ($updated) {
        $user->save();
        return redirect()->route('administracion')->with('success', 'Perfil actualizado exitosamente.');
    }

    return redirect()->route('administracion');
}

public function upload_photo(Request $request)
{

    $imagen = $request->file('photo');

    if($imagen) {
        //Se utiliza para borrar todos los registros de la  acrpeta
       // File::deleteDirectory(public_path('photos'));
        // Mueve la imagen a la carpeta public/photos
        $imagen->move(public_path('photos'), $imagen->getClientOriginalName());
    
        // Guarda el nombre del archivo en la base de datos
        $user = Auth::user();
        $user->photo = $imagen->getClientOriginalName();
        $user->save();
    
        // Muestra un mensaje de éxito
        return back()->with('success', 'La imagen se ha guardado correctamente.');
    }
    
    // Muestra un mensaje de error
    return back()->with('error', 'No se ha cargado ninguna imagen.');

}
}