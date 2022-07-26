<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
	</head>
	<body>
        @include('aplicacion.messages')
        @include('aplicacion.errors')
        @includeWhen(auth()->check(), 'aplicacion.navbar')
		@yield('content')
        @include('aplicacion.footer')
	</body>
</html>
