<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        return view('consultas.index', [
            'cuentas' => auth()->user()->cuentas,
        ]);
    }
}
