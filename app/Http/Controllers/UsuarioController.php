<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Requests\UsuarioDeleteRequest;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
	{
		return view('usuarios.index', [
			'usuarios' => Usuario::allWithDecodedPassword()->orderByDesc('id')->take(500)->get(),
		]);
	}

	public function create()
	{
		return view('usuarios.create');
	}

	public function store(UsuarioRequest $request)
	{
		if(! $usuario = Usuario::createWithEncodedPassword($request->validated()) )
			return back()->with('message', 'Intenta crear el usuario nuevamente');

		return redirect()->route('usuarios.index')->with('message', 'Usuario creado');
	}

	public function edit(Usuario $usuario)
	{
		return view('usuarios.edit')->with('usuario', $usuario);
	}

	public function update(UsuarioUpdateRequest $request, Usuario $usuario)
	{
		$prepared = Usuario::prepareWithEncodedPassword($request->validated());

		if(! $usuario->fill($prepared)->save() )
			return back()->with('message', 'Intenta actualizar el usuario nuevamente');

		return redirect()->route('usuarios.edit', $usuario)->with('message', 'Usuario actualizado');
	}

	public function destroy(UsuarioDeleteRequest $request, Usuario $usuario)
	{
		if(! $usuario->delete() )
			return back()->with('message', "Error al eliminar usuario {$usuario->usuario}");

		return redirect()->route('usuarios.index')->with('message', "Usuario {$usuario->usuario} eliminado");
	}
}
