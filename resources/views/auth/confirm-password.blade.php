@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	<form method="POST" action="{{ route('password.confirm') }}" id="form" class="needs-validation">
		@csrf

		<div class="card">
			<dic class="card-header">
				<h3>Password Confirmation.</h3>
			</dic>
			<div class="card-body">
				<p>This is a secure area of the application. Please confirm your password before continuing.</p>
				<div class="form-group row m-2 @error('password') has-error @enderror">
					<label for="password" class="col-sm-4 col-form-label col-form-label-sm">Password : </label>
					<div class="col-sm-8 my-auto">
						<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password">
						@error('password') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
					</div>
				</div>
			</div>
			<div class="card-footer text-end">
				<div class="text-center m-0">
					<button type="submit" class="btn btn-sm btn-primary m-3">
						{{ __('Confirm') }}
					</button>
				</div>
			</div>
		</div>


	</form>
</div>
@endsection

@section('js')
@endsection
