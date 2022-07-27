<?php

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\EscritorioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('web')->get('/terminos_condiciones', [AutenticacionController::class,'terminos_condiciones'])->name('autenticacion.terminos_condiciones');

Route::middleware('guest')->group(function () {
    Route::controller(UsuarioController::class)->group( function () {
        Route::get('/registrar', 'create')->name('usuarios.create');
        Route::post('/registrar', 'store')->name('usuarios.store');
    });

    Route::controller(AutenticacionController::class)->group(function () {
        Route::get('/entrar', 'login')->name('login');
        Route::post('/entrar', 'logging')->name('logging');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/', [EscritorioController::class, 'index'])->name('escritorio');
    // Route::resource('usuarios', UsuarioController::class)->except(['create','store']);
    // Route::get('/salir', [AutenticacionController::class, 'logout'])->name('logout');
});
