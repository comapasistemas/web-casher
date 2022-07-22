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
			<td>{{ $usuario->password }}</td>
			<td>{{ $usuario->email }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
