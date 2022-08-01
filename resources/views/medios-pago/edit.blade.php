@extends('app')
@section('content')
<div>
    <p>
        <em>Posiblemente se requiera el password del usuario autenticado para continuar con esta acción de ver y modificar el medio de pago</em>
    </p>
    <h3>Información del medio de pago</h3>
    <form action="{{ route('medios-pago.update', mt_rand(1,10)) }}" method="post">
        @include('medios-pago._form')
        <button type="submit">Modificar medio de pago</button>
        <a href="{{ route('medios-pago.index') }}">Regresar</a>
        @method('patch')
        @csrf
    </form>
</div>
@endsection
