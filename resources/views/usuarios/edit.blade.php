@extends('app')
@section('content')
<form action="{{ route('usuarios.update', $usuario) }}" method="post">
    <h3>Información</h3>
    <div>
        <label for="inputNombres">Nombre(s)</label>
        <input type="text" name="nombres" id="inputNombres" value="{{ old('nombres', $usuario->nombres) }}" pattern="[a-zA-Z\s]+" required>
        <small></small>
    </div>
    <div>
        <label for="inputApellidoPaterno">Apellido paterno</label>
        <input type="text" name="apellido_paterno" id="inputApellidoPaterno" value="{{ old('apellido_paterno', $usuario->apellidopaterno) }}" pattern="[a-zA-Z\s]+" required>
        <small></small>
    </div>
    <div>
        <label for="inputApellidoMaterno">Apellido materno</label>
        <input type="text" name="apellido_materno" id="inputApellidoMaterno" value="{{ old('apellido_materno', $usuario->apellidomaterno) }}" pattern="[a-zA-Z\s]+" required>
        <small></small>
    </div>

    <h3>Acceso</h3>
    <div>
        <label for="inputCorreoElectronico">Correo electrónico</label>
        <input type="email" name="correo_electronico" id="inputCorreoElectronico" value="{{ old('correo_electronico', $usuario->email) }}" required>
        <small>Para recibir notificaciones</small>
    </div>
    <div>
        <label for="inputUsuario">Usuario</label>
        <input type="text" name="usuario" id="inputUsuario" value="{{ old('usuario', $usuario->usuario) }}" pattern="[a-zA-Z0-9]+" required>
        <small>De 6 a 12 caractéres</small>
    </div>
    <div>
        <label for="inputContrasena">Contrase&ntilde;a</label>
        <input type="password" name="contrasena" id="inputContrasena">
        <small>Mínimo 6 caractéres</small>
    </div>
    <div>
        <label for="inputConfirmarContrasena">Confirmar contrase&ntilde;a</label>
        <input type="password" name="confirmar_contrasena" id="inputConfirmarContrasena">
        <small></small>
    </div>
    <br>
    <button type="submit">Actualizar</button>
    <a href="{{ route('usuarios.index') }}">Regresar</a>
    @csrf
    @method('patch')
</form>
<p>
    <small>Actualizado: {{ $usuario->updated_at }}</small>
    <br>
    <small>Creado: {{ $usuario->created_at }}</small>
</p>
<hr>
<form action="{{ route('usuarios.destroy', $usuario) }}" method="post">
    <div>
        <input type="checkbox" name="eliminar" id="checkboxEliminar" value="yes" required>
        <label for="checkboxEliminar">Eliminar definitivamente el registro de usuario</label>
    </div>
    <br>
    <button type="submit">Eliminar</button>
    @csrf
    @method('delete')
</form>
@endsection
