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

	{!! Form::open(['route' => 'categories.store', 'class' => 'form-horizontal']) !!}
		<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('cate', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'category', @$value, ['class' => 'form-control', 'placeholder' => 'Category', 'id' => 'cate']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						{!! Form::input('checkbox', 'active', TRUE, @$value) !!}&nbsp;Aktif
					</label>
				</div>
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

	@if( count($cate) > 0 )
		<table id="example" class="table table-border table-hover ">
			<thead>
				<th>id</th>
				<th>category</th>
				<th>pengaktifan</th>
				<th>sunting</th>
			</thead>
			<tfoot>
				<td>id</td>
				<td>category</td>
				<td>pengaktifan</td>
				<td>sunting</td>
			</tfoot>
			<tbody>
				@foreach ($cate as $k)
					<tr>
						<td><a href="{!! route('categories.edit', $k->id) !!}" class="btn btn-info">edit {!! $k->id !!}</a></td>
						<td>{!! $k->category !!}</td>
						<td>{!! ( $k->active == NULL ) ? 'tidak aktif' : 'aktif' !!}</td>
						<td><a href="{!! route('categories.destroy', $k->id) !!}" class="btn btn-danger remove">padam {!! $k->id !!}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
	@endif
	</div>
</div>
@endsection