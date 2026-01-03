@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">

	<form method="POST" action="{{ route('register') }}" id="form" class="needs-validation">
		@csrf

		<div class="card">
			<div class="card-header">
				<h3>Sign Up</h3>
			</div>
			<div class="card-body">


				<div class="form-group row m-2 @error('name') has-error @enderror">
					<label for="name" class="col-sm-4 col-form-label col-form-label-sm">Name : </label>
					<div class="col-sm-8 my-auto">
						<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Name">
						@error('name') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>

				<div class="form-group row m-2 @error('email') has-error @enderror">
					<label for="email" class="col-sm-4 col-form-label col-form-label-sm">Email : </label>
					<div class="col-sm-8 my-auto">
						<input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email">
						@error('email') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>

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
						<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password">
						@error('password') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>

				<div class="form-group row m-2 @error('password_confirmation') has-error @enderror">
					<label for="password_confirmation" class="col-sm-4 col-form-label col-form-label-sm">Password Confirmation : </label>
					<div class="col-sm-8 my-auto">
						<input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation">
						@error('password_confirmation') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>

			</div>
			<div class="card-footer text-end">
				<div class="m-0">
					<button type="submit" class="btn btn-sm btn-primary m-3">
						{{ __('Register') }}
					</button>

					<a class="" href="{{ route('login') }}">
						{{ __('Already registered?') }}
					</a>
				</div>
			</div>
		</div>

	</form>
</div>
@endsection

@section('js')
@endsection
