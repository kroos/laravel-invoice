@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">


		<div class="card">
			<div class="card-header">
				<h3>Reset Password</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('password.store') }}" id="form" class="needs-validation">
					@csrf
					<input type="hidden" name="token" value="{{ $request->token }}">
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
							<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Password">
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
			<div class="card-footer">
				<div class="text-center m-0">
					<button type="submit" class="btn btn-sm btn-primary m-0">
						{{ __('Reset Password') }}
					</button>
				</div>
				</form>
			</div>
		</div>

</div>
@endsection

@section('js')
@endsection
