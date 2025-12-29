@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('password.email') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	<div class="card">
		<div class="card-header">Forgot Password</div>
		<div class="form-group row m-1 @error('email') has-error @enderror">
			<label for="email" class="col-form-label col-sm-2">Email : </label>
			<div class="col-sm-6 my-auto">
				<input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email">
				@error('email')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1 my-auto">Send Password Reset Link</button>
		</div>
	</div>
</div>
</form>
@endsection

@section('jquery')

$("#na").keyup(function() {
   lch(this);
});

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
					message: ' Please insert a valid email address'
				},
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////
@endsection
