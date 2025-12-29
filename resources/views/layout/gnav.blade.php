<!-- 2nd nav -->
<nav class="navbar navbar-expand-lg bg-primary mb-auto" data-bs-theme="dark">
	<div class="container-fluid">
		<?php $logo = App\Preferences::find(1) ?>
		<img src=" data:{!! $logo->company_logo_mime !!};base64,{!! $logo->company_logo_image !!}" alt="Home" title="Home" width="7%" class="mx-2 my-auto img-responsive img-rounded">
		<a
			class="navbar-brand"
			@auth
				href="{{ route('auth.index') }}"
			@else
				href="{{ url('/') }}"
			@endauth
		>
			{!! config('app.name') !!}
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mx-auto">
			@auth
				<li class="nav-item">
					<span class="nav-link">Welcome {!! auth()->user()->name !!}</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{!! route('sales.index') !!}">Invoice</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{!! route('printreport.index') !!}">Print Report</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Product & Customer</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{!! route('product.index') !!}">Product</a>
						<a class="dropdown-item" href="{!! route('category.create') !!}">Category</a>
						<a class="dropdown-item" href="{!! route('taxes.index') !!}">Taxes</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!! route('customers.index') !!}">Customers List</a>
					</div>
				</li>
				@if((auth()->user()->id_group) == 1)
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Setting</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{!! route('user.index') !!}">Add User</a>
						<a class="dropdown-item" href="{!! route('usergroup.create') !!}">Add User Group</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!! route('banks.index') !!}">Bank Activation</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{!! route('preferences.edit', 1) !!}">Preferences</a>
					</div>
				</li>
				@endif
			@else
				<!-- nav for guest -->
			@endauth
			</ul>


			@if (Route::has('login'))
				@auth
					<div class="dropdown me-5">
						<a href="#" class="btn btn-sm btn-outline-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							@if(\Auth::user()->unreadNotifications?->count())
								<span class="badge text-bg-warning">
									{{ \Auth::user()->unreadNotifications->count() }}
								</span>
							@endif
			  {{ Auth::user()->name }}
			</a>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="{!! route('user.edit', auth()->user()->slug) !!}"><i class="fa-regular fa-user"></i> Profile</a>
							</li>
							<li>
								<!-- notification -->
							</li>
							<li>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-light fa-right-from-bracket"></i> Log Out</a>
								</form>
							</li>
						</ul>
					</div>

				@else
					<a class="btn btn-sm btn-secondary {{ (Route::has('register'))?'me-1':'me-5' }}" href="{{ route('login') }}">Sign in</a>
					@if (Route::has('register'))
						<a href="{{ route('register') }}" class="btn btn-sm btn-secondary me-5">Sign up</a>
					@endif
				@endauth
			@endif

		</div>
	</div>
</nav>
<!-- 2nd nav end -->
