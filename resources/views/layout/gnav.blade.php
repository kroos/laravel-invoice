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
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
					<li>
						<?php $logo = App\Preferences::find(1) ?>
						<a href="{!! route('auth.index') !!}"><!-- <img src=" data:{!! $logo->company_logo_mime !!};base64,{!! $logo->company_logo_image !!}" alt="Home" title="Home" width="5%" class="img-responsive img-rounded"> -->Home</a>
					</li>
                        @if (Auth::guest())
                            <li><a href="{!! route('login') !!}">Login</a></li>
                        @endif
			@if(Auth::check())
					<li><a href="{!! route('user.edit', auth()->user()->slug) !!}">Welcome {!! auth()->user()->name !!}</a></li>
					<li>
						<a href="{!! route('sales.index') !!}">Invoice</a>
					</li>
					<li>
						<a href="{!! route('printreport.index') !!}">Print Report</a>
					</li>
					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Invoice Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('product.create') !!}">Adding Product</a></li>
								<li><a href="{!! route('category.create') !!}">Adding Category</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('customers.index') !!}">Customers List</a></li>
								<li role="separator" class="divider"></li>
							</ul>
						</div>
					</li>
					@if((auth()->user()->id_group) == 1)
					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Setting<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('user.create') !!}">Add User</a></li>
								<li><a href="{!! route('usergroup.create') !!}">Add User Group</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('banks.index') !!}">Bank Activation</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('preferences.edit', 1) !!}">Preferences</a></li>
								<li role="separator" class="divider"></li>
							</ul>
						</div>
					</li>
					@endif
					<li><a href="{!! route('auth.destroy') !!}">Logout</a></li>
			@endif
				</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>
