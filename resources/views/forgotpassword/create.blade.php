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
	<div class="panel-heading">Forgot Password</div>
<div class="panel-body">
	{!! Form::open(['route' => 'password.email', 'class' => 'form-horizontal']) !!}
		<div class="form-group {!! ( count($errors->get('email')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('na', 'Email :', ['class' => 'col-sm-2  control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'email', @$value, ['class' => 'form-control', 'id' => 'na', 'placeholder' => 'Email']) !!}
			</div>
		</div>

		<div class="col-sm-offset-2 col-sm-10">
			{!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
		</div>

	{!! Form::close() !!}
</div></div>


@endsection


@section('jquery')
<!-- 	$("input").keyup(function() {
		toUpper(this);
	}); -->
@endsection