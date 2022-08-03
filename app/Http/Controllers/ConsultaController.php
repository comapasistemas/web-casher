<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->cuentas->load(['facturaPagar']));

        return view('consultas.index', [
            'cuentas_asociadas' => auth()->user()->cuentas->load([
                'residente.ruta',
                // 'residente.cuenta',
                'facturaPagar',
            ]),
        ]);
    }
}
