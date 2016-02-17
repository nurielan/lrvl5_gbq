<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gangstown Barbershop :: @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="xsrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}" media="all">
	<link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}" media="all">
	<link rel="stylesheet" href="{!! asset('assets/js/jqueryui/jquery-ui.min.css') !!}" media="all">
	<link rel="stylesheet" href="{!! asset('assets/js/jqueryui/jquery-ui.structure.min.css') !!}" media="all">
	<link rel="stylesheet" href="{!! asset('assets/js/jqueryui/jquery-ui.theme.min.css') !!}" media="all">
	<link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}" media="all">
</head>
</head>
<body>
	@if (!Request::is('ticket'))
	{!! Form::open(['url' => 'queuecopy']) !!}
	{!! Form::button('Reset', ['class' => 'btn btn-danger btn-xs', 'name' => 'queue_reset', 'type' => 'submit']) !!}
	{!! Form::close() !!}
	@endif

	<div class="container">
		@yield('content')
	</div>

	<script src="{!! asset('assets/js/jquery.js') !!}"></script>
	<script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
	<script src="{!! asset('assets/js/jqueryui/jquery-ui.min.js') !!}"></script>
	<script src="{!! asset('assets/js/script.js') !!}"></script>
</body>
</html>