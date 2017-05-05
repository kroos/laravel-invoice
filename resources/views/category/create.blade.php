@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

	{!! Form::open(['route' => 'category.store', 'class' => 'form-horizontal']) !!}
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Product Category</div>
			<div class="panel-body">
				<div class="col-lg-12">
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
							{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
						</div>
					</div>
				</div>
				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>
<?php
// dt-responsive nowrap
?>

<div class="row ">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Product Category List</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="col-lg-10 table-responsive col-centered">
					@if( count($cate) > 0 )
					<table id="example" class="table table-border table-hover ">
						<thead>
							<th>id</th>
							<th>category</th>
							<th>active</th>
							<th>delete</th>
						</thead>
						<tbody>
							@foreach ($cate as $k)
							<tr>
								<td><a href="{!! route('category.edit', $k->id) !!}" class="btn btn-info">edit {!! $k->id !!}</a></td>
								<td>{!! $k->product_category !!}</td>
								<td>{!! ( $k->active == NULL ) ? 'inactive' : 'active' !!}</td>
								<td><a href="{!! route('category.destroy', $k->id) !!}" class="btn btn-danger remove">delete {!! $k->id !!}</a></td>
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