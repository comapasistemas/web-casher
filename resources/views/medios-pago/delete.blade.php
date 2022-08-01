@extends('app')
@section('content')
<div>
    <form action="{{ route('medios-pago.destroy', mt_rand(1,10)) }}" method="post">
        <p>Deseas continuar para eliminar el medio de pago de tu cuenta?</p>
        <p>Información:</p>
        <ul>
            <li>Alias descriptivo</li>
            <li>Terminacion</li>
            <li>Vencimiento</li>
        </ul>
        <p><em>No podras usar este medio de pago para siguientes pagos de tus recibos</em></p>
        <button type="submit">Si, continua para eliminar medio de pago</button>
        <a href="{{ route('medios-pago.index') }}">No, regresar sin eliminar medio de pago</a>
        @method('delete')
        @csrf
    </form>
</div>
@endsection
