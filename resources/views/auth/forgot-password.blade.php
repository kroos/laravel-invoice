@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	<form method="POST" action="{{ route('password.email') }}" id="form" class="needs-validation">
		@csrf

		<div class="card">
			<div class="card-header">
				<h3>Forgot Password</h3>
			</div>
			<div class="card-body">
				<p>Forgot your password? No problem. Just let us know your username and we will email you a password reset link that will allow you to choose a new one.</p>
				<div class="form-group row m-2 @error('username') has-error @enderror">
					<label for="username" class="col-sm-4 col-form-label col-form-label-sm">Username : </label>
					<div class="col-sm-8 my-auto">
						<input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Username">
						@error('username') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>
			</div>
			<div class="card-footer text-end">
				<div class="m-0">
					<button type="submit" class="btn btn-sm btn-primary m-3">
						{{ __('Password Reset Link') }}
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection

@section('js')
@endsection
