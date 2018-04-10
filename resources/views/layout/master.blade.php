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
	<link href="favicon.ico" type="image/x-icon" rel="icon" />
	<meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="/css/app.css" rel="stylesheet">
<script src="/js/ucwords.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>

</head>
<body>

@include('layout.gnav')

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			@section('content')
			@show
		</div>
		<div class="footer">
			<p class="text-center">copyright : terajutara resources (m) sdn bhd {!! date('Y') !!}</p>
		</div>
	</div>
</div>
<script src="/js/app.js" type="text/javascript" ></script>
@include('layout.jscript')
</body>
</html>
