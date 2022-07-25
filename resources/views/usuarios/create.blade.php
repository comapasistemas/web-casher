@extends('app')
@section('content')
<p>
    <a href="{{ route('autenticacion.entrar') }}">Entrar</a>
</p>
<h1>IMPORTANTE</h1>
<h2>La informacion debe corresponder exactamante como aparece en tu recibo de Comapa</h2>
<form action="{{ route('usuarios.store') }}" method="post" autocomplete="off">
    <h3>Identificación</h3>
    <div>
        <label for="inputNumeroCuenta">Número de cuenta</label>
        <input type="text" name="numero_cuenta" id="inputNumeroCuenta" value="{{ old('numero_cuenta') }}" maxlength="6" pattern="\d{6}" required>
        <small>Los seis(6) dígitos que se muestran en la parte superior izquierda de tu recibo Comapa</small>
    </div>
    <div>
        <label for="inputNombreRecibo">Nombre completo del recibo</label>
        <input type="text" name="nombre_recibo" id="inputNombreRecibo" value="{{ old('nombre_recibo') }}" pattern="[A-Z\s]+" onkeyup="this.value=this.value.toUpperCase()" required>
        <small>Nombre completo como se muestra en tu recibo Comapa</small>
    </div>

    <h3>Información</h3>
    <div>
        <label for="inputNombres">Nombre(s)</label>
        <input type="text" name="nombres" id="inputNombres" value="{{ old('nombres') }}" pattern="[a-zA-Z\s]+" required>
        <small>Revisa tu recibo de pago</small>
    </div>
    <div>
        <label for="inputApellidoPaterno">Apellido paterno</label>
        <input type="text" name="apellido_paterno" id="inputApellidoPaterno" value="{{ old('apellido_paterno') }}" pattern="[a-zA-Z\s]+" required>
        <small>Revisa tu recibo de pago</small>
    </div>
    <div>
        <label for="inputApellidoMaterno">Apellido materno</label>
        <input type="text" name="apellido_materno" id="inputApellidoMaterno" value="{{ old('apellido_materno') }}" pattern="[a-zA-Z\s]+" required>
        <small>Revisa tu recibo de pago</small>
    </div>

    <h3>Acceso</h3>
    <div>
        <label for="inputCorreoElectronico">Correo electrónico</label>
        <input type="email" name="correo_electronico" id="inputCorreoElectronico" value="{{ old('correo_electronico') }}" required>
        <small>Para recibir notificaciones</small>
    </div>
    <div>
        <label for="inputUsuario">Usuario</label>
        <input type="text" name="usuario" id="inputUsuario" value="{{ old('usuario') }}" pattern="[a-zA-Z0-9]+" required>
        <small>De 6 a 12 caractéres</small>
    </div>
    <div>
        <label for="inputContrasena">Contrase&ntilde;a</label>
        <input type="password" name="contrasena" id="inputContrasena" required>
        <small>Mínimo 6 caractéres</small>
    </div>
    <div>
        <label for="inputConfirmarContrasena">Confirmar contrase&ntilde;a</label>
        <input type="password" name="confirmar_contrasena" id="inputConfirmarContrasena" required>
        <small></small>
    </div>
    <br>
    <div>
        <input type="checkbox" name="acepto_terminos_condiciones" value="1" id="checkboxAceptoTerminosCondiciones" required>
        <label for="checkboxAceptoTerminosCondiciones">He leído y acepto los <a href="#!" target="_blank">términos y condiciones</a> para el uso de la aplicación establecidos por Comapa.</label>
    </div>
    <br>
    @csrf
    <button type="submit">Registrame</button>
</form>
@endsection
