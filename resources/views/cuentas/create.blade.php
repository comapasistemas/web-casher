@extends('app')
@section('content')
<h3>Agregar una cuenta asociada</h3>
<form action="{{ route('cuentas.store') }}" method="post">
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
    <button type="submit">Agregar cuenta</button>
    <a href="{{ route('cuentas.index') }}">Cancelar</a>
    @csrf
</form>
@endsection
