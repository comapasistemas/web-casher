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
			'usuarios' => Usuario::allWithDecoded()->orderBy('id', 'desc')->take(500)->get(),
		]);
	}

	public function create()
	{
		return view('usuarios.create');
	}

	public function store(UsuarioRequest $request)
	{
		if(! $usuario = Usuario::createWithEncodePassword($request->validated()) )
			return back()->with('message', 'Intenta registrarte nuevamente');

		return redirect()->route('autenticacion.entrar', ['usuario' => $usuario->usuario])->with('message', 'Registro de usuario con éxito');
	}

	public function edit(Usuario $usuario)
	{
		return view('usuarios.edit')->with('usuario', $usuario);
	}

	public function update(UsuarioUpdateRequest $request, Usuario $usuario)
	{
		if(! $usuario->fill($request->validated())->save() )
			return back()->with('message', 'Intenta nuevamente para actualizar');

		return redirect()->route('usuarios.edit', $usuario)->with('message', 'Usuario actualizado');
	}

	public function destroy(UsuarioDeleteRequest $request, Usuario $usuario)
	{
		if(! $usuario->delete() )
			return back()->with('message', "Error al eliminar usuario {$usuario->usuario}");

		return redirect()->route('usuarios.index')->with('message', "Usuario {$usuario->usuario} eliminado");
	}
}
