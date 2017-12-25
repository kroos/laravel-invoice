@extends('layout.master')

@section('content')

	@include('layout.errorform')
	@include('layout.info')
{!! Form::open(['route' => 'auth.store', 'class' => 'form-horizontal', 'id' => 'form', 'autocomplete' => 'off']) !!}

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Login</div>
		<div class="panel-body">

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group {!! ( count($errors->get('email')) ) > 0 ? 'has-error' : '' !!}">
						{!! Form::label('na', 'Username :', ['class' => 'control-label col-lg-2']) !!}
						<div class="col-lg-10">
							{!! Form::text('username', @$value, ['class' => 'form-control', 'id' => 'na', 'placeholder' => 'Username', 'autocomplete' => 'off']) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group {!! ( count($errors->get('password')) ) > 0 ? 'has-error' : '' !!}">
						{!! Form::label('pas', 'Password :', ['class' => 'control-label col-lg-2']) !!}
						<div class="col-lg-10">
							{!! Form::input('password', 'password', @$value, ['class' => 'form-control', 'id' => 'pas', 'placeholder' => 'Password']) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									{!! Form::input('checkbox', 'remember', TRUE, @$value) !!}&nbsp;Remember me
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							{!! Form::submit('Login', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<p><a class="btn btn-link" href="{!! route('forgotpassword.create') !!}">Forgot Your Password?</a></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

{!! Form::close() !!}

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