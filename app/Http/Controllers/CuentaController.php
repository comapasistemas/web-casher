<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index()
    {
        return view('cuentas.index');
    }

    public function create()
    {
        return view('cuentas.create');
    }

    public function store()
    {
        return 'Agregando cuenta a ...';
    }

    public function delete($cuenta)
    {
        return view('cuentas.delete', [
            'cuenta' => $cuenta,
        ]);
    }

    public function destroy($id)
    {
        return 'Eliminando cuenta de ...';
    }
}
