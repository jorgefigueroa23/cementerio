<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TumbaController;
use App\Http\Controllers\TrasladosController;
use App\Http\Controllers\PabellonController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EntierroController;
use App\Http\Controllers\DetalleEntierroController;
use App\Http\Controllers\DetalleTumbaController;
use App\Http\Controllers\ObrasAdicionalesController;
use App\Http\Controllers\EstadoPagoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('auth.login');
});
Route::post('logout-other-devices', [LoginController::class, 'logoutOtherDevices'])
    ->middleware(['auth']) // Solo los usuarios autenticados pueden cerrar la sesión en otros dispositivos
    ->name('logout.other.devices');

Route::post('login', [LoginController::class, 'login'])
    ->middleware(['guest', 'ensure.logout.other.devices'])
    ->name('login');

/* Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('login'); */

Auth::routes();
/* Route::get('/', [HomeController::class, 'index'])->name('home'); */
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::post('/usuarios/crear', [UserController::class, 'create'])->name('crearUsuario');
/* Route::post('/usuarios/guardar', [UserController::class, 'store'])->name('guardarUsuario'); */
Route::get('/usuarios/{usuario}/editar', [UserController::class, 'edit'])->name('editarUsuario');
Route::put('/usuarios/{usuario}/actualizar', [UserController::class, 'update'])->name('actualizarUsuario');
Route::post('/usuarios/delete/{usuario}', [UserController::class, 'destroy'])->name('eliminarUsuario');
Route::post('/usuarios/activar/{usuario}', [UserController::class, 'activar'])->name('activarUsuario');

Route::get('/obtenerTumbas/{pabellon_id}', [TumbaController::class, 'obtenerTumbas'])->name('obtenerTumbas');
Route::get('/tumbas', [TumbaController::class, 'index'])->name('tumbas');
Route::get('/tumbas/crear', [TumbaController::class, 'create'])->name('crearTumba');
Route::post('/tumbas/guardar', [TumbaController::class, 'store'])->name('guardarTumba');
Route::get('/tumbas/{tumba}/editar', [TumbaController::class, 'edit'])->name('editarTumba');
Route::put('/tumbas/actualizar/{tumba}', [TumbaController::class, 'update'])->name('actualizarTumba');
Route::delete('/tumbas/{tumba}/eliminar', [TumbaController::class, 'destroy'])->name('eliminarTumba');
Route::get('/buscarDatosTumba/{id}', [TumbaController::class, 'datosTumba'])->name('datosTumba');
Route::get('/buscarDatosTumba1/{id}', [TumbaController::class, 'datosDetalleTumba1'])->name('datosDetalleTumba1');
Route::get('/buscarDatosTumba2/{id}', [TumbaController::class, 'datosDetalleTumbaProgramado'])->name('datosDetalleTumbaProgramado');
Route::get('/buscarDatosTumba3/{id}', [TumbaController::class, 'datosDetallaEnterrado'])->name('datosDetalleTumbaEnterrado');

/* Route::get('/traslados', [TrasladosController::class, 'index'])->name('traslados');
Route::get('/traslados/crear', [TrasladosController::class, 'create'])->name('crearTraslado');
Route::post('/traslados/guardar', [TrasladosController::class, 'store'])->name('guardarTraslado');
Route::get('/traslados/{traslado}/editar', [TrasladosController::class, 'edit'])->name('editarTraslado');
Route::put('/traslados/{traslado}/actualizar', [TrasladosController::class, 'update'])->name('actualizarTraslado'); */

Route::get('/procesos/estadoPago', [EstadoPagoController::class, 'index'])->name('pagoIndex');
Route::get('/procesos/tumbasDisponibles', [TumbaController::class, 'index'])->name('tumbasIndex');
Route::get('/procesos/traslados', [TrasladosController::class, 'index'])->name('trasladosIndex');
Route::get('/procesos/enterrados', [EntierroController::class, 'index'])->name('enterradosIndex');

Route::get('/procesos/datosEstadoPago', [EstadoPagoController::class, 'datosEstadoPago'])->name('datosEstadoPago');
Route::get('/procesos/datosEstadoIndex', [EstadoPagoController::class, 'datosIndex'])->name('datosEstadoIndex');
Route::get('/procesos/datosIndex', [TumbaController::class, 'datosIndex'])->name('datosIndex');
Route::get('/procesos/datosTraslados', [TrasladosController::class, 'datosTraslados'])->name('datosTraslados');
Route::get('/procesos/datosEntierro', [EntierroController::class, 'datosEntierro'])->name('datosEntierro');

Route::get('admin/pabellones', [PabellonController::class, 'index'])->name('pabellones');
Route::get('/selectPabellon', [PabellonController::class, 'selectPabellon'])->name('selectPabellon');
Route::get('/selectObrasAdd', [PabellonController::class, 'selectObrasAdd'])->name('selectObrasAdd');
Route::get('/selectpagoAdd', [PabellonController::class, 'selectpagoAdd'])->name('selectpagoAdd');

Route::get('/obtenerFilasyColumnas/{pabellon}', [PabellonController::class, 'filasYcolumnas'])->name('filasYcolumnas');

Route::get('admin/pabellones/create', [PabellonController::class, 'create'])->name('crearPabellon');
Route::post('admin/pabellones/guardar', [PabellonController::class, 'store'])->name('storePabellon');
Route::get('admin/pabellones/{pabellon}/editar', [PabellonController::class, 'edit'])->name('editarPabellon');
Route::put('admin/pabellones/{pabellon}/actualizar', [PabellonController::class, 'update'])->name('actualizarPabellon');
Route::delete('admin/pabellones/{pabellon}/eliminar', [PabellonController::class, 'destroy'])->name('eliminarPabellon');

Route::get('admin/servicios', [ObrasAdicionalesController::class, 'index'])->name('indexObrasAdd');
Route::get('admin/servicios/datos', [ObrasAdicionalesController::class, 'datosObras'])->name('datosObrasAdd');
Route::get('admin/servicios/crear', [ObrasAdicionalesController::class, 'create'])->name('crearObrasAdd');
Route::post('admin/servicios/guardar', [ObrasAdicionalesController::class, 'store'])->name('guardarObrasAdd');
Route::put('admin/servicios/{id}/actualizar', [ObrasAdicionalesController::class, 'update'])->name('actualizarObrasAdd');
Route::delete('admin/servicios/{id}/eliminar', [ObrasAdicionalesController::class, 'destroy'])->name('eliminarObrasAdd');

/* CONTRASEÑA */
Route::post('resetpass/{id}', [UserController::class, 'resetPassword'])->name('user.resetpass');
Route::post('updatepass', [UserController::class, 'updatepass'])->name('user.updatepass');
Route::get('profile',[HomeController::class, 'profile'])->name('profile');

