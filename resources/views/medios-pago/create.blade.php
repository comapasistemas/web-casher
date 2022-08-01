@extends('app')
@section('content')
<div>
    <h3>Información del medio de pago</h3>
    <form action="{{ route('medios-pago.store') }}" method="post">
        @include('medios-pago._form')
        <button type="submit">Agregar medio de pago</button>
        <a href="{{ route('medios-pago.index') }}">Cancelar</a>
        @csrf
    </form>
</div>
@endsection
