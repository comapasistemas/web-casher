<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AutenticacionController extends Controller
{
    public function login(Request $request)
    {
        return view('autenticacion.entrar', [
            'usuario' => $request->filled('usuario') ? $request->usuario : '',
        ]);
    }
}
