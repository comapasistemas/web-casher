@extends('app')
@section('content')
<p>
    <a href="{{ route('autenticacion.entrar') }}">Entrar</a>
</p>
<h1>IMPORTANTE</h1>
<h2>La informacion debe corresponder exactamante como aparece en tu recibo de Comapa</h2>
<form action="{{ route('usuarios.store') }}" method="post" autocomplete="off">
    <h3>Contrato</h3>
    <div>
        <label for="inputNumeroCuenta">Número de cuenta</label>
        <input type="text" name="numero_cuenta" id="inputNumeroCuenta" value="{{ old('numero_cuenta') }}">
        <!-- maxlength="6" pattern="\d{6}" -->
        <small>Los seis(6) dígitos que se muestran en la parte superior izquierda de su recibo Comapa</small>
    </div>
    <div>
        <label for="inputNombreRecibo">Nombre completo del recibo</label>
        <input type="text" name="nombre_recibo" id="inputNombreRecibo" value="{{ old('nombre_recibo') }}" onkeyup="this.value=this.value.toUpperCase()">
        <small>Nombre completo como se muestra en su recibo Comapa</small>
    </div>

    <h3>Información</h3>
    <div>
        <label for="inputNombres">Nombre(s)</label>
        <input type="text" name="nombres" id="inputNombres" value="{{ old('nombres') }}">
        <small>Revisa tu recibo de pago</small>
    </div>
    <div>
        <label for="inputApellidoPaterno">Apellido paterno</label>
        <input type="text" name="apellido_paterno" id="inputApellidoPaterno" value="{{ old('apellido_paterno') }}">
        <small>Revisa tu recibo de pago</small>
    </div>
    <div>
        <label for="inputApellidoMaterno">Apellido materno</label>
        <input type="text" name="apellido_materno" id="inputApellidoMaterno" value="{{ old('apellido_materno') }}">
        <small>Revisa tu recibo de pago</small>
    </div>

    <h3>Acceso</h3>
    <div>
        <label for="inputCorreoElectronico">Correo electrónico</label>
        <input type="text" name="correo_electronico" id="inputCorreoElectronico" value="{{ old('correo_electronico') }}">
        <small>Para recibir notificaciones</small>
    </div>
    <div>
        <label for="inputUsuario">Usuario</label>
        <input type="text" name="usuario" id="inputUsuario" value="{{ old('usuario') }}">
        <small>De 6 a 10 caractéres</small>
    </div>
    <div>
        <label for="inputContrasena">Contrase&ntilde;a</label>
        <input type="password" name="contrasena" id="inputContrasena">
        <small>De 6 a 10 caractéres</small>
    </div>
    <div>
        <label for="inputConfirmarContrasena">Confirmar contrase&ntilde;a</label>
        <input type="password" name="confirmar_contrasena" id="inputConfirmarContrasena">
        <small>De 6 a 10 caractéres</small>
    </div>
    <br>
    <div>
        <input type="checkbox" name="acepto_terminos_condiciones" value="1" id="checkboxAceptoTerminosCondiciones">
        <label for="checkboxAceptoTerminosCondiciones">He leído y acepto los <a href="#!" target="_blank">términos y condiciones</a> para el uso de la aplicación establecidos por Comapa.</label>
    </div>
    <br>
    @csrf
    <button type="submit">Registrame</button>
</form>
@endsection
