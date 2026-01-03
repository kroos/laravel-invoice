<!-- 2nd nav -->
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
	<div class="container-fluid">
		<?php $logo = \App\Models\Preferences::find(1) ?>
		<img src="data:{!! $logo->company_logo_mime !!};base64,{!! $logo->company_logo_image !!}" alt="{!! config('app.name') !!}" title="{!! config('app.name') !!}" width="7%" class="mx-2 my-auto img-responsive img-rounded">
		<a
			class="navbar-brand"
			@auth
				href="{{ url('/dashboard') }}"
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
				@include('layouts.navigation')
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
								<a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fa-regular fa-user"></i> Profile</a>
							</li>
							<li>
								<!-- notification -->
								@include('layouts.notification')
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
