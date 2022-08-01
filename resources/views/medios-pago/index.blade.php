@extends('app')
@section('content')
<div>
    <p>
        <a href="{{ route('medios-pago.create') }}">Agregar medio de pago</a>
    </p>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Alias descriptivo</th>
                <th>Banco</th>
                <th>Terminación</th>
                <th>Tipo</th>
                <th>Vencimiento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for($i = 1; $i <= 5; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $alias_descriptivos[ mt_rand(0,4) ] }}</td>
                <td>{{ $bancario['nombres_bancos'][ mt_rand(0, 6)] }}</td>
                <td>
                    <span>{{ mt_rand(1000, 9999) }}</span>
                </td>
                <td>
                    <small>{{ $bancario['redes_tarjeta'][ mt_rand(0,2) ] }}</small>
                </td>
                <td>{{ mt_rand(01,12) }}/{{ mt_rand($bancario['vigencia_maxima_tarjeta'], $bancario['vigencia_minima_tarjeta']) }}</td>
                <td>
                    <a href="{{ route('medios-pago.edit', $i) }}">Editar</a>
                    <a href="{{ route('medios-pago.delete', $i) }}">Eliminar</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection


