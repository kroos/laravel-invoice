@extends('layout.master')

@section('content')

	@include('layout.errorform')
	@include('layout.info')
	
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

<div class="panel panel-default">
	<div class="panel-heading">Reset Password</div>
<div class="panel-body">
	{!! Form::open(['route' => 'password.request', 'id' => 'form', 'class' => 'form-horizontal']) !!}
	{!! Form::hidden('token', $token) !!}
		<div class="form-group {!! ( count($errors->get('email')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('na', 'Email :', ['class' => 'col-sm-2  control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('email', @$value, ['class' => 'form-control', 'id' => 'na', 'placeholder' => 'Email', 'autocomplete' => 'off']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('nap', 'Password :', ['class' => 'col-sm-2  control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password', @$value, ['class' => 'form-control', 'id' => 'nap', 'placeholder' => 'Password']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password_confirmation')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('napq', 'Password Confirmation :', ['class' => 'col-sm-2  control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password_confirmation', @$value, ['class' => 'form-control', 'id' => 'napq', 'placeholder' => 'Password Confirmation']) !!}
			</div>
		</div>

		<div class="col-sm-offset-2 col-sm-10">
			{!! Form::submit('Reset', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
		</div>

	{!! Form::close() !!}
</div></div>


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