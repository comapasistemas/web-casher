@extends('app')
@section('content')
	<table>
		<thead>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
			<tr>
				<td>{{ $usuario->id }}</td>
				<td>{{ $usuario->nombres }}</td>
				<td>{{ $usuario->apellidopaterno }}</td>
				<td>{{ $usuario->email }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection
