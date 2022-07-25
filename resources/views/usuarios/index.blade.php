@extends('app')
@section('content')
<table>
	<thead>
	</thead>
	<tbody>
		@foreach($usuarios as $usuario)
		<tr>
			<td>{{ $usuario->id }}</td>
			<td>{{ $usuario->nombre_completo }}</td>
			<td>{{ $usuario->usuario }}</td>
			<td>{{ $usuario->decodificado }}</td>
			<td>{{ $usuario->password }}</td>
			<td>{{ $usuario->email }}</td>
			<td>
				<a href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
