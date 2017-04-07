<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html lang=en>
<head>
	<meta charset=utf-8>
	<meta content="IE=edge" http-equiv=X-UA-Compatible>
	<meta content="width=device-width, initial-scale=1" name=viewport>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<meta name=description content="Content">
	<meta name=author content="Author">
	<title>Really Learning Laravel :)</title>
	<link href="favicon.ico" type="image/x-icon" rel="icon" />
	<meta name="keywords" content="" />

	<!-- Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Optional font -->
	<link href="https://fonts.googleapis.com/css?family=Sanchez&amp;subset=latin-ext" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Extra stylesheet -->
<link href="/css/style.css" rel="stylesheet">

<!-- datatables : https://datatables.net/extensions/responsive/examples/styling/bootstrap.html -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript" ></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript" ></script>
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet" />

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

</head>
<body>

<script type="text/javascript">
jQuery.noConflict ();
	(function($){
		$(document).ready(function(){

			$('#example').DataTable();

			$('.remove').click(function(){
				swal({
					title: "Are you sure?",
					text: "You will not be able to recover this file!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					cancelButtonText: "No, cancel please!",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm) {
					if (isConfirm) {
						swal("Deleted!", "Your file has been deleted.", "success");
					} else {
						swal("Cancelled", "Your file is safe :)", "error");
					}
				});
			});

			@section('jquery')
			@show

		});
	})(jQuery);
</script>

@section('nav')
@show

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="page-header">
						<h1>Commission Form</h1>
						<p>Isi elok elok naaa..</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				@section('content')
				@show
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="page-footer">
						<footer class="text-center">Copyright : Terajutara Sdn Bhd {!! date('Y') !!}	</footer>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>