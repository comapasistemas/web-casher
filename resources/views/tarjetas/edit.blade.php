@extends('app')
@section('content')
<div>
    <p>
        <em>Posiblemente se requiera el password del usuario autenticado para continuar con esta acción de ver y modificar la tarjeta</em>
    </p>
    <h3>Información de la tarjeta</h3>
    <form action="{{ route('tarjetas.update', mt_rand(1,10)) }}" method="post">
        @include('tarjetas._form')
        <button type="submit">Modificar tarjeta</button>
        <a href="{{ route('tarjetas.index') }}">Regresar</a>
        @method('patch')
        @csrf
    </form>
</div>
@endsection
