<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	{{-- <link rel="stylesheet" href="{{ asset('css/normalize.css') }}"/> --}}
	{{-- <link rel="stylesheet" href="{{ asset('css/skeleton.css') }}"/> --}}
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
	<title>@yield('titulo', 'Prueba tecnica')</title>
	{{-- <style>
		body {
			background: #282c34;
		}
		.text-center { 
			text-align: center!important
		}
		.container {
			background: #f7f7f7;
		}
	</style> --}}
</head> 
<body style="background: #f1f1f1;">
	<div class="container">
		{{-- <div class="row" style="margin-top: 1%; margin-bottom: 3%">
			<h1 class="text-center">@yield('pagina', 'Prueba tecnica')</h1>
		</div> --}}
		<hr style="border-top: 1px solid rgba(0, 0, 0, 0)!important;" />
		@yield('content')
	</div>
</body>
	@stack('js')
</html>