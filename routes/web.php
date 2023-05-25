 <?php

use App\Http\Controllers\AddUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\AdministracionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name("login");

Route::get('/inicio', [InicioController::class, 'index'])->name('inicio')->middleware(['auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

Route::get('/historial', function () {
    return view('historial');
})->name("historial");

Route::get('/historial', [HistorialController::class, 'index'])->name('historial')->middleware(['auth']);

Route::get('/administracion', function () {
    return view('administracion');
})->name("administracion");

Route::get('/administracion', [AdministracionController::class, 'index'])->name('administracion')->middleware(['auth']);
Route::post('/administracion/photo', [AdministracionController::class, 'upload_photo'])->name('administracion.upload_photo')->middleware(['auth']);
Route::post('/administracion/photo', [AdministracionController::class, 'upload_photo'])->name('administracion.upload_photo')->middleware(['auth']);
Route::post('/administracion/update', [AdministracionController::class, 'updateProfile'])->name('administracion.updateProfile')->middleware(['auth']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/inicio/fichar', [InicioController::class, 'fichar'])->name('inicio.fichar')->middleware(['auth']);
Route::delete('/usuarios/{usuario}', [HistorialController::class, 'destroy'])->name('usuarios.destroy')->middleware('auth');
Route::post('/verdetalles', [HistorialController::class, 'showData'])->name('verDetalles')->middleware('auth');
Route::put('/verdetalles/update-center', [HistorialController::class, 'updateCenter'])->name('updateCenter')->middleware('auth');

Route::get('/addUser', function () {
    return view('adduser');
})->name("addUser");

Route::post('/historial', [AddUserController::class, 'store'])->name('add')->middleware('auth');

Route::get('/generar-pdf-semanal', [HistorialController::class, 'generarPDFSemanal'])->name('generarPDFSemanal');
Route::get('/generar-pdf-mensual', [HistorialController::class, 'generarPDFMensual'])->name('generarPDFMensual');