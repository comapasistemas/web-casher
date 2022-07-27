@extends('app')
@section('content')
<table>
	<thead>
		<tr>
			<th>ID</th>
			<!-- <th>NOMBRE COMPLETO</th> -->
			<!-- <th>CORREO ELECTRONICO</th> -->
			<th>USUARIO</th>
			<th>PASSWORD</th>
			<th>DECODED</th>
			<th>SECRET</th>
		</tr>
	</thead>
	<tbody>
		@foreach($usuarios as $usuario)
		<tr>
			<td>{{ $usuario->id }}</td>
			<!-- <td>{{ $usuario->nombre_completo }}</td> -->
			<!-- <td>{{ $usuario->email }}</td> -->
			<td>{{ $usuario->usuario }}</td>
			<td>{{ $usuario->password }}</td>
			<td>{{ $usuario->decoded }}</td>
			<td>{{ $usuario->secretword }}</td>
			<td>
				<a href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
