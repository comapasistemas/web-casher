@extends('app')
@section('content')
<?php 
$icons = ['Vigente', 'En proceso', 'Pagado', 'Vencido'];
$icons_count = count($icons);
?>
<p>Cuentas asociadas: {{ $cuentas_asociadas->count() }}</p>

<div>
    <form action="{{ route('consultas.index') }}" method="get">
        <div>
            <label for="selectCuenta">Cuenta</label>
            <select name="cuenta" id="selectCuenta">
                <option value="todas">Todas las cuentas asociadas</option>
                @foreach($cuentas_asociadas as $cuenta)
                <option value='{{ $cuenta->numero }}'>{{ $cuenta->numero }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="dateDesde">Desde</label>
            <input type="date" name="desde" id="dateDesde">
        </div>
        <div>
            <label for="dateHasta">Hasta</label>
            <input type="date" name="hasta" id="dateHasta">
        </div>
        <button type="submit">Filtrar saldos</button>
    </form>
</div>
<br>

<div>
    <table>
        <thead>
            <tr>
                <th>Cuenta</th>
                <th>Nombre</th>
                <th>Vencimiento</th>
                <th>Estado</th>
                <th>Importe</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cuentas_asociadas as $cuenta)
            <tr>
                <td>{{ $cuenta->numero }}</td>
                <td>{{ $cuenta->residente->nombre_completo }}</td>
                <td>{{ $cuenta->facturaPagar->fechaVencimiento($cuenta->residente->ruta->clave_vencimiento) }}</td>
                <td>{{ $icons[mt_rand(0, ($icons_count-1))] }}</td>
                <td>${{ mt_rand(10, 1000) * 1.99 }}</td>
                <td>
                    <a href="{{ route('pagos.create', 1) }}">Pagar</a>
                    <a href="#modal">Descargar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<p>Paginacion: 1 de #{{ $cuentas_asociadas->count() }}</p>

<hr>
<p><em>OLDER</em></p>
<div>
    <table>
        <thead>
            <tr>
                <th>Cuenta</th>
                <th>Nombre</th>
                <th>Vencimiento</th>
                <th>Importe</th>
                <th>PDF</th>
                <th>XML</th>
                <th>Estado</th>
                <th>Tarjeta de credito (pagar)</th>
                <th>Cuenta Banorte (pagar)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>000001</td>
                <td>NOMBRE COMPLETO DEL CUENTA 1</td>
                <td>01/MES/2030</td>
                <td>${{ mt_rand(10, 1000) * 1.99 }}</td>
                <td>Recibo domiciliario / No disponible</td>
                <td>Recibo domiciliario / <a href="#!">Complemento de pago</a></td>
                <td>{{ $icons[mt_rand(0, ($icons_count-1))] }}</td>
                <td><a href="#!">Pagar</a></td>
                <td><a href="#!">Pagar</a></td>
            </tr>
        </tbody>
    </table>
</div>
<p><em>OLDER</em></p>
<hr>

<div>
    <h4>IMPORTANTE</h4>
    <ul>
        <li>Te recomendados instalar el software <a href="https://get.adobe.com/es/reader/" target="_blank">Acrobat Reader</a> para visualizar tus recibos en formato <a href="https://www.adobe.com/mx/acrobat/about-adobe-pdf.html" target="_blank">PDF</a>.</li>
        <li>Imprime tus recibos solamente en <a href="https://www.webcartucho.mx/blog/impresora-de-tinta-o-impresora-laser" target="_blank">impresoras láser ó tinta</a> para la lectura correcta en sucursales como <a href="https://www.oxxo.com/" target="_blank">OXXO</a>.</li>
    </ul>
</div>
@endsection
