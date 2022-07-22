<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
	{
		return view('usuarios.index', [
			'usuarios' => Usuario::orderBy('id', 'desc')->take(100)->get(),
		]);
	}

	public function create()
	{
		return view('usuarios.create');
	}

	public function store(UsuarioRequest $request)
	{
		if(! $usuario = Usuario::create($request->validated()))
			return back()->with('message', 'Intenta registrarte nuevamente');

		return redirect()->route('autenticacion.entrar')->with('message', 'Usuario registrado');
	}
}
