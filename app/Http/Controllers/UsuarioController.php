<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
	{
		return view('usuarios.index')->with('usuarios', Usuario::orderBy('id', 'desc')->take(100)->get());
	}

	public function create()
	{
		return view('usuarios.create')->with('usuario', new Usuario);
	}

	public function store(UsuarioRequest $request)
	{
		return $request->validated();
	}
}
