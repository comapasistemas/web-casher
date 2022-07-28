<?php

namespace App\Http\Controllers\Autenticacion;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrarRequest;
use App\Http\Controllers\Controller;
use App\Models\Usuario;

class RegistrarController extends Controller
{
    public function create()
    {
        return view('autenticacion.registrar');
    }

    public function store(RegistrarRequest $request)
    {
		if(! $usuario = Usuario::createWithEncodedPassword($request->validated()) )
			return back()->with('message', 'Intenta registrarte nuevamente');

		return redirect()->route('login', ['usuario' => $usuario->usuario])->with('message', 'Registro con éxito');
    }
}
