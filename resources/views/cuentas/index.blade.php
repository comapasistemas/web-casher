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
            <tr>
                <td>00000{{ $i }}</td>
                <td>Nombre de la cuenta #{{ $i }}</td>
                <td>
                    <a href="#!">Eliminar</a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
