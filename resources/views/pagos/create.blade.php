@extends('app')
@section('content')
<div>
    <ul>
        <li>
            <small>Cuenta</small><br>
            <span>0123456</span>
        </li>
        <li>
            <small>Nombre</small><br>
            <span>Pancho Pantera</span>
        </li>
        <li>
            <small>Período</small><br>
            <span>Mes / 9999</span>
        </li>
        <li>
            <small>Importe</small><br>
            <strong>$550.26</strong>
        </li>
    </ul>
    <hr>
    <form action="{{ route('pagos.store', rand(100000,999999)) }}" method="post">
        <div>
            <label for="selectMedioPago">Medio de pago</label>
            <select name="medio_pago" id="selectMedioPago" required>
                <option disabled selected></option>
                <option value="1">Tarjeta morada</option>
                <option value="2">Banamex azul</option>
                <option value="3">Figura deportiva</option>
            </select>
        </div>
        <div>
            <ul>
                <li>
                    <small>Terminación del número de tarjeta</small>
                    <span>{{ mt_rand(1000,9999) }}</span>
                </li>
                <li>
                    <small>Red de tarjeta</small>
                    <span>{{ config('comuapoa.bancario.redes_tarjeta')[ mt_rand(0,2) ] }}</span>
                </li>
                <li>
                    <small>Vencimiento de tarjeta</small>
                    <span>{{ mt_rand(1,31) }}/{{ mt_rand(10,99) }}</span>
                </li>
            </ul>
        </div>
        <div>
            <label for="inputCodigoSeguridad">Código de seguridad</label>
            <input type="text" name="codigo_seguridad" id="inputCodigoSeguridad" required>
        </div>
        <button type="submit">Realizar pago</button>
        <a href="{{ route('consultas.index') }}">Regresar</a>
        @csrf
    </form>
    <hr>
    <form action="" method="post">
        <button type="submit">Transacción con Banorte</button>
    </form>
</div>
@endsection
