<?php

namespace App\Http\Controllers\Autenticacion;

use Illuminate\Http\Request;
use App\Http\Requests\AutenticarRequest;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;

class SesionController extends Controller
{
    public function login(Request $request)
    {
        return view('autenticacion.login', [
            'usuario' => $request->filled('usuario') ? $request->usuario : '',
        ]);
    }

    public function authenticate(AutenticarRequest $request)
    {
        $usuario = Usuario::findWithDecodedPassword($request->username, 'usuario')->first();

        if(! $usuario || $usuario->decoded <> $request->password)
            return back()->withInput($request->only('usuario'))->with('message', 'Usuario ó contraseña incorrectos');

        Auth::login($usuario);

        return redirect()->route('escritorio.index');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Session::flush();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
     
        return redirect()->route('login')->with('message', 'Sesión terminada');
    }
}
