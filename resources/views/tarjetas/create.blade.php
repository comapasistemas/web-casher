@extends('app')
@section('content')
<div>
    <h3>Información de la tarjeta</h3>
    <form action="{{ route('tarjetas.store') }}" method="post">
        @include('tarjetas._form')
        <button type="submit">Agregar tarjeta</button>
        <a href="{{ route('tarjetas.index') }}">Cancelar</a>
        @csrf
    </form>
</div>
@endsection
