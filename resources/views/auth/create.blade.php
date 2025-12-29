@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('auth.store') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="" enctype="multipart/form-data">
	@csrf


	<div class="card">
		<div class="card-header">Login</div>
		<div class="card-body">

			<div class="form-group row m-1 @error('username') has-error @enderror">
				<label for="usnm" class="col-form-label col-sm-2">Username : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="username" value="{{ old('username', @$variable->username) }}" id="usnm" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Username">
					@error('username')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('password') has-error @enderror">
				<label for="passw" class="col-form-label col-sm-2">Password : </label>
				<div class="col-sm-6 my-auto">
					<input type="password" name="password" value="{{ old('password', @$variable->password) }}" id="passw" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password">
					@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1">
				<label for="id" class="col-form-label col-sm-2"></label>
				<div class="col-sm-6 my-auto">
					<label for="remember" class="form-check-label">
						<input type="checkbox" name="remember" value="1" id="remember" class="form-check-input me-2">&nbsp;Remember me
					</label>
				</div>
			</div>

		</div>
		<div class="card-footer d-flex justify-content-end">
				<button type="submit" class="btn btn-sm btn-outline-secondary my-auto me-1">Submit</button>
				<a class="btn btn-sm btn-outline-secondary my-auto me-1" href="{!! route('forgotpassword.create') !!}">Forgot Your Password?</a>
		</div>
	</div>

</form>

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
		// email: {
		// 	validators: {
		// 		notEmpty: {
		// 			message: 'Please insert your email '
		// 		},
		// 		// emailAddress: {
		// 		// 	message: 'Please insert your valid email address'
		// 		// },
		// 		regexp: {
		// 			regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
		// 			message: ' Please insert your valid email address'
		// 		},
		// 		different: {
		// 			field: 'password',
		// 			message: 'The e-mail and password cannot be the same as each other'
		// 		},
		// 	}
		// },
		username: {
			message: 'The username is not valid',
			validators: {
				notEmpty: {
					message: 'The username is required and cannot be empty'
				},
				stringLength: {
					min: 6,
					max: 10,
					message: 'The username must be more than 6 and less than 10 characters long'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9_]+$/,
					message: 'The username can only consist of alphabetical, number and underscore'
				},
			}
		},
		password: {
			validators: {
				notEmpty: {
					message: 'Please insert your password '
				},
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////


@endsection
