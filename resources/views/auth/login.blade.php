@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	<form method="POST" action="{{ route('login') }}" id="form" class="needs-validation">
		@csrf

		<div class="card">
			<div class="card-header">
				<h3 class="">Sign In</h3>
			</div>
			<div class="card-body">
				<div class="form-group row m-2 @error('username') has-error @enderror">
					<label for="username" class="col-sm-4 col-form-label col-form-label-sm">Username : </label>
					<div class="col-sm-8 my-auto">
						<input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Username">
						@error('username') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>

				<div class="form-group row m-2 @error('password') has-error @enderror">
					<label for="password" class="col-sm-4 col-form-label col-form-label-sm">Password : </label>
					<div class="col-sm-8 my-auto">
						<input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Password">
						@error('password') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>

				<!-- Remember Me -->
				<div class="form-check m-2 d-flex justify-content-center">
					<input name="remember" class="form-check-input rounded" type="checkbox" value="1" id="remember_me">
					<label class="form-check-label" for="remember_me">
						Remember me
					</label>
				</div>
			</div>
			<div class="card-footer text-end">
				<div class="m-0">
					<button type="submit" class="btn btn-sm btn-primary m-3">
						{{ __('Log in') }}
					</button>

					@if (Route::has('password.request'))
					<a class="" href="{{ route('password.request') }}">
						{{ __('Forgot your password?') }}
					</a>
					@endif
				</div>
			</div>
		</div>
	</form>
</div>
@endsection

@section('js')
@endsection
