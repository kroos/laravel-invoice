@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

	<div class="row">
		<p>
			<a href="{!! route('category.create') !!}" class="btn btn-info">Back to category</a>
		</p>
	</div>

	{!! Form::model($productCategory, [ 'route' => ['category.update', $productCategory->id], 'method' => 'PATCH', 'class' => 'form-horizontal' ]) !!}

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Edit Product Category</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('cate', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('category', $productCategory->product_category, ['class' => 'form-control', 'placeholder' => 'Category', 'id' => 'cate']) !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('active', 1, $productCategory->active) !!}&nbsp;Aktif
							</label>
						</div>
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
	</div>
</div>

@endsection


@section('jquery')
	$("input").keyup(function() {
		tch(this);
	});
@endsection