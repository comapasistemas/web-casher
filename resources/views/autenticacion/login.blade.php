@extends('app')
@section('content')
<h1>Bienvenido</h1>
<form action="{{ route('authenticate') }}" method="post" autocomplete="off">
    <div>
        <label for="inputUsuario">Usuario</label>
        <input type="text" name="usuario" id="inputUsuario" value="{{ old('usuario', $usuario) }}" required>
    </div>
    <div>
        <label for="inputContrasena">Contrase&ntilde;a</label>
        <input type="password" name="contrasena" id="inputContrasena" required>
    </div>
    <br>
    <button type="submit">Iniciar sesión</button>
    @csrf
</form>
<p>
    <span>¿No recuerdas la contrase&ntilde;a?</span>
    <a href="#!">Recuperar contrase&ntilde;a</a>
</p>
<hr>
<p>¿Aún no usas nuestra aplicación? <a href="{{ route('registrar.create') }}">Registrate aqui</a></p>
@endsection
