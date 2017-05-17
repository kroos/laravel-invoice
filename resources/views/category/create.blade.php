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
							<th>&nbsp;</th>
							<th>category</th>
							<th>active</th>
						</thead>
						<tbody>
							@foreach ($cate as $k)
							<tr>
								<td>
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										<li role="separator" class="divider"></li>
										<li><a href="{!! route('category.edit', $k->id) !!}" >edit</a></li>
										<li><a href="{!! route('category.destroy', $k->id) !!}" >delete</a></li>
										<li role="separator" class="divider"></li>
									</ul>
								</div>
								</td>
								<td>{!! $k->product_category !!}</td>
								<td>{!! ( $k->active == NULL ) ? 'inactive' : 'active' !!}</td>
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