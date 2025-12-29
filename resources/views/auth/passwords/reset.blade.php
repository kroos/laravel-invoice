@extends('layout.master')

@section('content')
<div class="card">
	<div class="card-header">Reset Password</div>
	<div class="card-body">
		<form method="POST" action="{{ route('password.request') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="" enctype="multipart/form-data">
			@csrf
			<div class="form-group row m-1 @error('email') has-error @enderror">
				<label for="email" class="col-form-label col-sm-2">Wmail : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Wmail">
					@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('password') has-error @enderror">
				<label for="pass" class="col-form-label col-sm-2">Password : </label>
				<div class="col-sm-6 my-auto">
					<input type="password" name="password" value="{{ old('password') }}" id="pass" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password">
					@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('password_confirmation') has-error @enderror">
				<label for="passc" class="col-form-label col-sm-2">Password Confirmation : </label>
				<div class="col-sm-6 my-auto">
					<input type="password" name="password_confirmation" value="{{ old('password_confirmation', @$variable->password_confirmation) }}" id="passc" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation">
					@error('password_confirmation')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-sm btn-outline-secondary">Submit</button>
		</div>

	</form>
</div>
@endsection


@section('jquery')
////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$("#form").bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		email: {
			validators: {
				notEmpty: {
					message: 'Please insert your email '
				},
				regexp: {
					regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
					message: ' Please insert your valid email address'
				},
			}
		},
		password: {
			validators: {
				notEmpty: {
					message: 'Please insert your password. '
				},
				regexp: {
					regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/,
					message: 'Passwords are 8-16 characters with uppercase letters, lowercase letters and at least one number. '
				},
			}
		},
		password_confirmation: {
			validators: {
				notEmpty: {
					message: 'Please insert your confirmation password. '
				},
				identical: {
					field: 'password',
					message: 'The password and its confirmation are not the same. '
				}
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////
@endsection
