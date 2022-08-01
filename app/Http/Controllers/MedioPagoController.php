<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedioPagoController extends Controller
{
    public function index()
    {
        return view('medios-pago.index', [
            'alias_descriptivos' => ['Tarjeta morada', 'Primary card', 'Con simbolo de balon', 'Azul marino', 'SieteCero'],
            'bancos' => config('comuapoa.bancos'),
            'meses' => config('comuapoa.meses'),
            'tipos_tarjeta' => config('comuapoa.tipos_tarjeta'),
        ]);
    }

    public function create()
    {
        return view('medios-pago.create', [
            'bancos' => config('comuapoa.bancos'),
            'meses' => config('comuapoa.meses'),
            'tipos_tarjeta' => config('comuapoa.tipos_tarjeta'),
            'years' => range((date('Y') + 5), (date('Y') - 5)),
        ]);
    }

    public function store(Request $request)
    {
        return 'Guardando medio de pago...';
    }

    public function edit($medio_pago)
    {
        return view('medios-pago.edit', [
            'bancos' => config('comuapoa.bancos'),
            'meses' => config('comuapoa.meses'),
            'tipos_tarjeta' => config('comuapoa.tipos_tarjeta'),
            'years' => range((date('Y') + 5), (date('Y') - 5)),
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
