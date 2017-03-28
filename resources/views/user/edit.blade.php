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

	<div class="row"><a href="{!! route('user.create') !!}" class="btn btn-info">Back to users</a></div>

	{!! Form::model($users, [
						'route' => [
										'user.update',
										$users->id
									],
						'method' => 'PATCH',
						'class' => 'form-horizontal'
					]) !!}


		<div class="form-group {!! ( count($errors->get('name')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('nam', 'Name :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'name', $users->name, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('email')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('email', 'Email :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'email', $users->email, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password', @$value, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password_confirmation')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass1', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password_confirmation', @$value, ['class' => 'form-control', 'placeholder' => 'Password Confirmation', 'id' => 'pass1']) !!}
			</div>
		</div>

<?php
foreach ($gr as $key) {
	$lm[$key->id] = $key->group;
}
?>

		<div class="form-group {!! ( count($errors->get('id_group')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('ug', 'User Group :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('id_group', $lm, $users->id_group,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose User Group']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>

@endsection