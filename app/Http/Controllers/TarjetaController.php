<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    public function index()
    {
        return view('tarjetas.index', [
            'bancos' => config('comuapoa.bancos'),
            'tipos_tarjeta' => config('comuapoa.tipos_tarjeta'),
            'meses' => config('comuapoa.meses'),
            'alias_descriptivos' => ['Tarjeta morada', 'Primary card', 'Con simbolo de balon', 'Azul marino', 'SieteCero'],
        ]);
    }

    public function create()
    {
        return view('tarjetas.create', [
            'bancos' => config('comuapoa.bancos'),
            'tipos_tarjeta' => config('comuapoa.tipos_tarjeta'),
            'meses' => config('comuapoa.meses'),
            'years' => range((date('Y') + 5), (date('Y') - 5)),
        ]);
    }

    public function store(Request $request)
    {
        return 'Guardando tarjeta...';
    }

    public function edit($id)
    {
        return view('tarjetas.edit', [
            'bancos' => config('comuapoa.bancos'),
            'tipos_tarjeta' => config('comuapoa.tipos_tarjeta'),
            'meses' => config('comuapoa.meses'),
            'years' => range((date('Y') + 5), (date('Y') - 5)),
        ]);
    }

    public function update(Request $request, $id)
    {
        return 'Actualizando tarjeta...';
    }

    public function delete($id)
    {
        return view('tarjetas.delete');
    }

    public function destroy($id)
    {
        return 'Eliminando tarjeta...';
    }
}
