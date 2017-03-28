@extends('nav')

@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});
@endsection


@section('content')
<div class="col-lg-8 col-lg-offset-2">

	@include('partial.errorform')
	@include('partial.info')

	{!! Form::open(['route' => 'usergroup.store', 'class' => 'form-horizontal']) !!}
		<div class="form-group {!! ( count($errors->get('group')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('ug', 'User Group :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'group', @$value, ['class' => 'form-control', 'placeholder' => 'User Group', 'id' => 'ug']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>

<div class="row ">
	<div class="col-lg-10 table-responsive col-centered">

<?php
// dt-responsive nowrap
?>

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
@endsection