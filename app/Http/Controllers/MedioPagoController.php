<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedioPagoController extends Controller
{
    public function index()
    {
        return view('medios-pago.index', [
            'alias_descriptivos' => ['Tarjeta morada', 'Primary card', 'Con simbolo de balon', 'Azul marino', 'SieteCero'],
            'bancario' => config('comuapoa.bancario'),
        ]);
    }

    public function create()
    {
        return view('medios-pago.create', [
            'bancario' => config('comuapoa.bancario'),
            'tiempo' => config('comuapoa.tiempo'),
        ]);
    }

    public function store(Request $request)
    {
        return 'Guardando medio de pago...';
    }

    public function edit($medio_pago)
    {
        return view('medios-pago.edit', [
            'bancario' => config('comuapoa.bancario'),
            'tiempo' => config('comuapoa.tiempo'),
        ]);
    }

    public function update(Request $request, $medio_pago)
    {
        return 'Actualizando medio de pago...';
    }

    public function delete($medio_pago)
    {
        return view('medios-pago.delete');
    }

    public function destroy($medio_pago)
    {
        return 'Eliminando medio de pago...';
    }
}
