@extends('app')
@section('content')
<h3>Usuario autenticado</h3>
<h1>{{ auth()->user()->nombre_completo }}</h1>
<form action="{{ route('logout') }}" method="post">
    <button type="submit">Cerrar sesión</button>
    @method('delete')
    @csrf
</form>
@endsection
