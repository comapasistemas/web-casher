@extends('app')
@section('content')
<div>
    <form action="" method="post">
        <p>Deseas continuar para eliminar la cuenta asociada a tu cuenta?</p>
        <p>Información:</p>
        <ul>
            <li>Numero de cuenta {{ $cuenta }}</li>
            <li>Nombre completo</li>
        </ul>
        <p><em>No podras usar esta cuenta para siguientes pagos de recibos</em></p>
        <button type="submit">Si, continua para eliminar cuenta asociada</button>
        <a href="{{ route('cuentas.index') }}">No, regresar sin eliminar cuenta asociada</a>
        @method('delete')
        @csrf
    </form>
</div>
@endsection
