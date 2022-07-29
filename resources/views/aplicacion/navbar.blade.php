<div>
    <form action="{{ route('logout') }}" method="post" style='text-align:right'>
        <button type="submit">Cerrar sesión</button>
        @method('delete')
        @csrf
    </form>
    <p>
        <small>Bienvenido usuario</small>
        <br>
        <b>{{ auth()->user()->usuario }}</b>
    </p>
</div>
<div>
    <a href="{{ route('escritorio.index') }}">Escritorio</a>
    <a href="{{ route('consultas.index') }}">Consultas</a>
    <a href="{{ route('cuentas.index') }}">Cuentas asociadas</a>
    <a href="{{ route('tarjetas.index') }}">Tarjetas</a>
</div>
<br>
