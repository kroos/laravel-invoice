@extends('nav')

@section('jquery')
	$(".put").keyup(function() {
		toUpper(this);
	});
@endsection


@section('content')
<div class="col-lg-8 col-lg-offset-2">

	@include('partial.errorform')
	@include('partial.info')

	{!! Form::open(['route' => 'sessions.store'], ['class' => 'form-horizontal']) !!}
		<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('mail', 'Email :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'email', @$value, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'mail']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password', @$value, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('remember', 1, false, @$value) !!}&nbsp;Remember Me
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>

<div class="row">
	<div class="col-sm-offset-2 col-sm-10">
		<a href="{!! route('sessions.index') !!}">Forgot your password?</a>
	</div>
</div>

@endsection