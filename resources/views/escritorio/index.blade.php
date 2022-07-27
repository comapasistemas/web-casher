@extends('app')
@section('content')
<h3>Usuario autenticado</h3>
<h1>{{ auth()->user()->nombre_completo }}</h1>
<p>
    <a href="{{ route('logout') }}">Salir</a>
</p>
@endsection
