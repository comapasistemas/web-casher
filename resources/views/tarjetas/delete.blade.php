@extends('app')
@section('content')
<div>
    <form action="{{ route('tarjetas.destroy', mt_rand(1,10)) }}" method="post">
        <p>Deseas continuar para eliminar la tarjeta de tu cuenta?</p>
        <p>Información:</p>
        <ul>
            <li>Alias descriptivo</li>
            <li>Terminacion</li>
            <li>Vencimiento</li>
        </ul>
        <p><em>No podras usar esta tarjeta para siguientes pagos de tus recibos</em></p>
        <button type="submit">Si, continua para eliminar tarjeta</button>
        <a href="{{ route('tarjetas.index') }}">No, regresar sin eliminar tarjeta</a>
        @method('delete')
        @csrf
    </form>
</div>
@endsection
