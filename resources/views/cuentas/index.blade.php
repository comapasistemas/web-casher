@extends('app')
@section('content')
<div>
    <h3>Cuentas</h3>
    <p>
        <a href="{{ route('cuentas.create') }}">Agregar cuenta</a>
    </p>
    <table>
        <thead>
            <tr>
                <th>Cuenta</th>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for($i = 1; $i <= 5; $i++)
            <?php $numero_cuenta = "00000{$i}" ?>
            <tr>
                <td>{{ $numero_cuenta }}</td>
                <td>Nombre de la cuenta #{{ $numero_cuenta }}</td>
                <td>
                    <a href="{{ route('cuentas.delete', $numero_cuenta) }}">Eliminar</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
