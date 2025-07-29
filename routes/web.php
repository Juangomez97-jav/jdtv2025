<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AutenticaController;
use App\Http\Controllers\PagosController;
use Illuminate\Support\Facades\Route;

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



Route::view('/','welcome')->name('home');

//Route::view('/','recaudo');

Route::resource('empresas',EmpresaController::class)->middleware('auth');

//rutas servicios
Route::resource('servicios',ServicioController::class)->middleware('auth');

//rutas materiales
Route::resource('materials',MaterialController::class)->middleware('auth');

//rutas Clientes
Route::resource('clientes',ClienteController::class)->middleware('auth');


//ruta Pagos
Route::resource('pagos',PagosController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Ruta de registro de usuarios
route::view('/registro', 'auth.registro')->name('registro');
route::post('/registro', [AutenticaController::class, 'registro'])->name('registro.store');

//Ruta de login de usuarios
route::view('/login', 'auth.login')->name('login');
route::post('/login', [AutenticaController::class, 'login'])->name('login.store');
//Ruta de logout de usuarios
route::post('/logout', [AutenticaController::class, 'logout'])->name('logout');

//Ruta para editar perfil de usuario
Route::get('/perfil', [AutenticaController::class, 'perfil'])->name('perfil');
Route::put('/perfil/{user}', [AutenticaController::class, 'perfilUpdate'])->name('perfil.update');
Route::delete('/perfil', [AutenticaController::class, 'destroy'])->name('perfil.destroy');
//Ruta para cambiar la contraseña de usuario
Route::put('/perfil/password/{user}', [AutenticaController::class, 'passwordUpdate'])->name('password.update');
