@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')
	{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal']) !!}
<div class="panel panel-default">
<div class="panel-heading">Add User</div>
	<div class="panel-body">

		<div class="form-group {!! ( count($errors->get('name')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('nam', 'Name :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'name', @$value, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']) !!}
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('email')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('email', 'Email :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'email', @$value, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) !!}
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('password')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password', @$value, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']) !!}
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('password_confirmation')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('us', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password_confirmation', @$value, ['class' => 'form-control', 'placeholder' => 'Password Confirmation', 'id' => 'us']) !!}
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
				{!! Form::select('id_group', $lm, NULL,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose User Group']) !!}
			</div>
		</div>
		
		
		<div class="form-group {!! ( count($errors->get('color')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('rgba', 'Choose Your Color :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'color', @$value, ['class' => 'form-control ', 'id' => 'rgba' ]) !!}
			</div>
		</div>
		
		
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
			</div>
		</div>
			{!! Form::close() !!}</div>
</div>
</div>

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Users List</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="row ">
					<div class="col-lg-10 table-responsive col-centered">
				
				<?php
				// dt-responsive nowrap
				?>
				
					@if( count($us) > 0 )
						<table id="example" class="table table-border table-hover ">
							<thead>
								<th>id</th>
								<th>name</th>
								<th>email</th>
								<th>group</th>
								<th>delete</th>
							</thead>
							<tbody>
								@foreach ($us as $k)
									<tr>
										<td><a href="{!! route('user.edit', $k->id) !!}" class="btn btn-info">edit {!! $k->id !!}</a></td>
										<td>{!! $k->name !!}</td>
										<td>{!! $k->email !!}</td>
											<?php
											// refer to users model
											$use = \App\UserGroup::findOrFail($k->id_group);
											?>
										<td>{!! $use->group !!}</td>
										<td>@if($k->id != 1)
											{!! Form::open(['route' => ['user.destroy', $k->id],'method' => 'delete',]) !!}
												{!! Form::submit('padam '.$k->id, ['class' => 'btn btn-danger remove']) !!}
											{!! Form::close() !!}
											@else
											<button class="btn btn-info">{!! $k->id !!}</button>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('jquery')
//	$("input").keyup(function() {
//		toUpper(this);
//	});

$('#rgba').minicolors({
	format: 'rgb',
	opacity: true,
	theme: 'bootstrap',
});
@endsection