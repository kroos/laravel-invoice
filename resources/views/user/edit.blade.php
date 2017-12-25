@extends('layout.master')

@section('content')
@if(auth()->user()->id_group == 1 ) 
	<div class="row"><p><a href="{!! route('user.create') !!}" class="btn btn-info">Back to users</a></p></div>
@endif
	@include('layout.errorform')
	@include('layout.info')
	{!! Form::model($user, [ 'route' => [ 'user.update', $user->slug ], 'method' => 'PATCH', 'class' => 'form-horizontal' ]) !!}

<div class="panel panel-default">
<div class="panel-heading">Edit User</div>
	<div class="panel-body">
		<div class="form-group {!! ( count($errors->get('name')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('nam', 'Name :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'name', $user->name, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('name')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('usernam', 'Username :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('username', @$value, ['class' => 'form-control put', 'placeholder' => 'Username', 'id' => 'usernam']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('email')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('email', 'Email :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password_confirmation')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass1', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Password Confirmation', 'id' => 'pass1']) !!}
			</div>
		</div>

<?php
foreach ($gr as $key) {
	$lm[$key->id] = $key->group;
}
?>
@if(auth()->user()->id_group == 1 ) 
		<div class="form-group {!! ( count($errors->get('id_group')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('ug', 'User Group :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('id_group', $lm, $user->id_group,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose User Group']) !!}
			</div>
		</div>
@else
		{!! Form::hidden('id_group', $user->id_group) !!}
@endif

		<div class="form-group {!! ( count($errors->get('color')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('rgba', 'Choose Your Color :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'color', @$value, ['class' => 'form-control ', 'id' => 'rgba' ]) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>
</div>

@endsection


@section('jquery')

$('#rgba').minicolors({
	format: 'rgb',
	opacity: true,
	theme: 'bootstrap',
});
@endsection