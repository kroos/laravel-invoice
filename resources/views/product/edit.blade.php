@extends('layout.master')

@section('content')
	<div class="row"><p><a href="{!! route('product.create') !!}" class="btn btn-info">Back to products</a></p></div>
	@include('layout.errorform')
	@include('layout.info')

	{!! Form::model($product, ['route' => ['product.update', $product->slug], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Product</div>
				<div class="panel-body">
					<div class="col-lg-12">
						<div class="form-group {!! ( count($errors->get('product')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('nam', 'Product :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'product', $product->product, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']) !!}
							</div>
						</div>
			
						<?php
						$lm = array();
						$pc = App\ProductCategory::where(['active' => 1])->get();
						foreach ($pc as $key) {
							$lm[$key->id] = $key->product_category;
						}
						?>
			
						<div class="form-group {!! ( count($errors->get('id_category')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('ug', 'Product Category :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::select('id_category', $lm, $product->id_category,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose Product Category']) !!}
							</div>
						</div>
			
						<div class="form-group {!! ( count($errors->get('commission')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('commission', 'Commission :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'commission', $product->commission, ['class' => 'form-control', 'placeholder' => 'Commission', 'id' => 'commission']) !!}
							</div>
						</div>
			
						<div class="form-group {!! ( count($errors->get('retail')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('pass', 'Retail :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'retail', $product->retail, ['class' => 'form-control', 'placeholder' => 'Retail', 'id' => 'pass']) !!}
							</div>
						</div>
			
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="checkbox">
									<label>
										{!! Form::checkbox('active', 1, $product->active) !!}&nbsp;Active
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								{!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="row ">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Product Image List</div>
				<div class="panel-body">
					<div class="col-lg-12">
						<div class="col-lg-10 table-responsive col-centered">
							
							<?php
							$pro = App\ProductImage::where(['id_product' => $product->id])->get();
							?>
							
							@if( count($pro) > 0 )
							<table id="example" class="table table-border table-hover ">
								<thead>
									<th>id</th>
									<th>image</th>
									<th>delete</th>
								</thead>
								<tbody>
									@foreach ($pro as $k)
									<tr>
										<td>{!! $k->id !!}</td>
										<td>
											<?php
											echo '<a href="'.route('productimage.edit' ,$k->id).'"><img src="data:'.$k->mime.';base64, '.$k->image.'" class="img-responsive img-rounded"></a>';
											
											?>
										</td>
										<td><a href="{!! route('productimage.destroy', $k->id) !!}" class="btn btn-danger remove">delete {!! $k->id !!}</a></td>
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
</div>


@endsection


@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});
@endsection