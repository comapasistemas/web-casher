<?php

use App\Http\Controllers\AutenticacionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UsuarioController::class)->group( function () {
    Route::get('/registrar', 'create')->name('usuarios.create');
    Route::post('/registrar', 'store')->name('usuarios.store');
});
Route::resource('usuarios', UsuarioController::class)->except([
    'create',
    'store',
]);

Route::controller(AutenticacionController::class)->group(function () {
    Route::get('/entrar', 'login')->name('autenticacion.entrar');
});
