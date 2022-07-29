@extends('app')
@section('content')
<div>
    <div>
        <p>Saldos pendientes</p>
        <table>
            <tbody>
                @for($i = 1; $i <= 5; $i++)
                <tr>
                    <td>Nombre de cuenta {{ $i }}</td>
                    <td>${{ mt_rand(10, 1000) * 1.99 }}</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <hr>
    <div>
        <p>Promedio de saldos al momento</p>
        @for($i = 1; $i <= 5; $i++)
        <div>
            <p>
                <b>${{ mt_rand(10, 1000) * 1.99 }}</b>
                <br>
                <small>Nombre de cuenta {{ $i }}</small>
            </p>
        </div>
        @endfor
    </div>
</div>
<hr>
<div>
    <h3>Necesitas los archivos XML de tus recibos?</h3>
    <p>Envíanos un correo electrónico a <a href="mailto:contacto@comapanuevolaredo.gob.mx">contacto@comapanuevolaredo.gob.mx</a> con la siguiente información:</p>
    <ul>
        <li>Nombre completo</li>
        <li>Correo electrónico</li>
        <li>Número de cuenta</li>
        <li>Meses específicos que solicita</li>
    </ul>
</div>
<hr>
<div>
    <p>
        <span>Aplicacion 2.3</span>
        <small>(Actualizado 01/Enero/2000)</small>
    </p>
    <ul>
        @foreach([
            'Selección de banco para realizar pago',
            'Optimización de interface',
            'Correcion de errores y mejoras de rendimiento'
        ] as $commit)
        <li>{{ $commit }}</li>
        @endforeach
    </ul>
</div>
<br>
@endsection
