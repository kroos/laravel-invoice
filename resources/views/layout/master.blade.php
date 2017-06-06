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

	<!-- Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

	<!-- Optional font -->
	<link href="https://fonts.googleapis.com/css?family=Sanchez&amp;subset=latin-ext" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Extra stylesheet -->
<link href="/css/app.css" rel="stylesheet">

<!-- datatables : https://datatables.net/extensions/responsive/examples/styling/bootstrap.html -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript" ></script>
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet" />

<!-- select2 https://select2.github.io/ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" />

<!-- MiniColors  / color picker http://labs.abeautifulsite.net/jquery-minicolors/index.html -->
<script src="/js/jquery.minicolors.js"></script>
<link rel="stylesheet" href="/css/jquery.minicolors.css">

<!-- ucwords -->
<script src="/js/ucwords.js"></script>

<!-- chained dropdown -->
<script src="/js/jquery.chained.min.js" type="text/javascript" ></script>

<!-- jquery ui -->
<!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->

	<!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

	<!-- sweet alert for deleting something (https://lipis.github.io/bootstrap-sweetalert/) -->
	<link href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet">
	<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js" ></script>

	<!-- javascript chart : http://www.chartjs.org/ -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

	<!-- ckeditor sdk http://sdk.ckeditor.com/index.html -->
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
@include('layout.jscript')
</body>
</html>
