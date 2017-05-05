@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">Add User Group</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'usergroup.store', 'class' => 'form-horizontal']) !!}
		<div class="form-group {!! ( count($errors->get('group')) ) >0 ? 'has-error' : '' !!}">
				{!! Form::label('ug', 'User Group :', ['class' => 'col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::input('text', 'group', @$value, ['class' => 'form-control', 'placeholder' => 'User Group', 'id' => 'ug']) !!}
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
				</div>
			</div>
				{!! Form::close() !!}
		</div>
	</div>
</div>

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">User Groups List</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="row ">
					<div class="col-lg-10 table-responsive col-centered">
				
					@if( count($ug) > 0 )
						<table id="example" class="table table-border table-hover ">
							<thead>
								<th>id</th>
								<th>group</th>
							</thead>
							<tfoot>
								<td>id</td>
								<td>group</td>
							</tfoot>
							<tbody>
								@foreach ($ug as $k)
									<tr>
										<td>{!! $k->id !!}</td>
										<td>{!! $k->group !!}</td>
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
	$("input").keyup(function() {
		toUpper(this);
	});
@endsection