@extends('layout.master')

@section('nav')

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
	<div class="container topnav">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand topnav" href="{!! route('sessions.index') !!}">Utama</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endif
			@if(Auth::check())
					<li><a href="#">Welcome {!! auth()->user()->name !!}</a></li>
					<li>
						<a href="{!! route('transactions.create') !!}">Commissions Entry</a>
					</li>
					<li>
						<a href="{!! route('transactions.print') !!}">Print Report</a>
					</li>
					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Product Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<li>
									<a href="{!! route('product.create') !!}">Adding Product</a>
								</li>
								<li role="separator" class="divider"></li>
								<li>
									<a href="{!! route('categories.create') !!}">Adding Category</a>
								</li>
							</ul>
						</div>
					</li>
					@if((auth()->user()->id_group) == 1)
					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								User Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="{!! route('user.create') !!}">Add User</a></li>
								<li><a href="{!! route('usergroup.create') !!}">Add User Group</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
					</li>
					@endif
					<li><a href="{!! route('sessions.destroy') !!}">Logout</a></li>
			@endif
				</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>

@endsection