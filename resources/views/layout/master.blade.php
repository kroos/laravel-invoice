<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html lang=en>
<head>
	<meta charset=utf-8>
	<meta content="IE=edge" http-equiv=X-UA-Compatible>
	<meta content="width=device-width, initial-scale=1" name=viewport>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<meta name=description content="Content">
	<meta name=author content="Author">
	<title>{{ config('app.name') }}</title>
	<link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon" />
	<meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
	<link href="{{ mix('css/tailwind.css') }}" rel="stylesheet">

	<!-- Bootswatch Cerulean CSS -->
	<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
	<!-- Livewire CSS -->
</head>
<body class="bg-secondary bg-opacity-75">
	<div class="container-fluid mx-auto min-vh-100 row align-items-center justify-content-center">
		<div class="container-fluid mb-auto">
			@include('layout.gnav')
		</div>

		<div class="col-sm-4 my-2">
	    @include('layout.errorform')
	    @include('layout.info')
	    @include('layout.success')
		</div>

		<div class="container my-0 d-flex align-items-center justify-content-center">
			<div class="col-sm-8">
				@section('content')
				@show
			</div>
		</div>

		<div class="container py-0 align-self-end text-center fs-6 text-secondary fw-lighter m-0">
			<p class="text-center">copyright : terajutara resources (m) sdn bhd {!! date('Y') !!}</p>
			Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
		</div>
	</div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
@include('layout.jscript')
</html>
