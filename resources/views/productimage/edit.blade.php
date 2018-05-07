@extends('layout.master')

@section('content')
<?php $rt = App\Product::find($productImage->id_product) ?>
	<div class="row"><p><a href="{!! route('product.edit', $rt->slug) !!}" class="btn btn-info">Back to product</a></p></div>
	@include('layout.errorform')
	@include('layout.info')

	{!! Form::model($productImage, ['route' => ['productimage.update',$productImage->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'files' => true]) !!}


<div class="panel panel-default">
	<div class="panel-heading">Edit Image for <strong>{!! $rt->product !!}</strong></div>
	<div class="panel-body">

		<div class="form-group {!! ( count($errors->get('image')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('img', 'Image :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::file('image', ['id' => 'img']) !!}
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
/////////////////////////////////////////////////////////////////////////////////////////
	$("input").keyup(function() {
		tch(this);
	});

/////////////////////////////////////////////////////////////////////////////////////////



@endsection