<?php

use App\Http\Controllers\Autenticacion\RegistrarController;
use App\Http\Controllers\Autenticacion\SesionController;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ContratoController;
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

Route::middleware(['web','guest'])->group(function () {
    Route::get('contrato', [ContratoController::class, 'index'])
        ->withoutMiddleware('guest')
        ->name('contrato.index');

    Route::controller(RegistrarController::class)
        ->group(function() {
            Route::get('registrar', 'create')->name('registrar.create');
            Route::post('registrar', 'store')->name('registrar.store');
        });

    Route::controller(SesionController::class)
        ->group(function() {
            Route::get('/', 'login')->name('login');
            Route::post('/', 'authenticate')->name('authenticate');
        });
});

Route::middleware(['web','auth'])->group(function () {
    Route::get('escritorio', [EscritorioController::class, 'index'])->name('escritorio.index');
    Route::get('consultas', [ConsultaController::class, 'index'])->name('consultas.index');

    Route::delete('/', [SesionController::class, 'logout'])->name('logout');
});

