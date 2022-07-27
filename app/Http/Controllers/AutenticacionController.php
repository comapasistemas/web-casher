<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AutenticacionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AutenticacionController extends Controller
{
    public function login(Request $request)
    {
        return view('autenticacion.entrar', [
            'usuario' => $request->filled('usuario') ? $request->usuario : '',
        ]);
    }

    public function logging(AutenticacionRequest $request)
    {
        $usuario = Usuario::findWithDecoded($request->username, 'usuario')->first();

        if(! $usuario || $usuario->decoded <> $request->password)
            return back()->withInput($request->only('usuario'))->with('message', 'Usuario ó contraseña incorrectos');

        Auth::login($usuario);
        return redirect('/home')->with('message', 'Credenciales correctas!');
    }

    public function logout(Request $request)
    {
        // Session::flush();
        
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login')->with('message', 'Sesión terminada');
    }

    public function terminos_condiciones()
    {
        return view('autenticacion.terminos_condiciones');
    }
}
