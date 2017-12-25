@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Product</div>
			<div class="panel-body">
				{!! Form::open(['route' => 'product.store', 'class' => 'form-horizontal', 'files' => true]) !!}
				{!! Form::hidden('id_user', auth()->id()) !!}
				<div class="form-group {!! ( count($errors->get('product')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('pr', 'Product :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'product', @$value, ['class' => 'form-control', 'placeholder' => 'Product', 'id' => 'pr']) !!}
					</div>
				</div>
		
				<div class="form-group {!! ( count($errors->get('retail')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('co', 'Retail :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'retail', @$value, ['class' => 'form-control', 'placeholder' => 'Retail in RM', 'id' => 'co']) !!}
					</div>
				</div>
@if(auth()->user()->id_group == 1)
				<div class="form-group {!! ( count($errors->get('commission')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('com', 'Commission :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'commission', @$value, ['class' => 'form-control', 'placeholder' => 'Commission in RM', 'id' => 'com']) !!}
					</div>
				</div>
@else
{!! Form::hidden('commission', 0) !!}
@endif
				<?php
				$r = array();
				foreach ($cate as $key) {
					$r[$key->id] = $key->product_category;
				}
				?>
				<div class="form-group {!! ( count($errors->get('id_category')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('cat', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('id_category', $r, NULL, ['class' => 'form-control', 'placeholder' => 'Choose Category', 'id' => 'cat']) !!}
					</div>
				</div>
		
				<div class="form-group {!! ( count($errors->get('image')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('img', 'Image :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::file('image[]', ['id' => 'img', 'multiple' => 'multiple']) !!}
					</div>
				</div>

@if(auth()->user()->id_group == 1)
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
								{!! Form::input('checkbox', 'active', TRUE, @$value) !!}&nbsp;Active
							</label>
						</div>
					</div>
				</div>
@else
{!! Form::hidden('active', 0) !!}
@endif
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
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
		<div class="panel-heading">Product List</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="col-lg-10 table-responsive col-centered">
					
					<?php
					// dt-responsive nowrap
					?>
					
				@if( count($pro) > 0 )
					<table id="example" class="table table-border table-hover ">
						<thead>
							<th>&nbsp;</th>
							<th>product</th>
							<th>category</th>
							<th>retail</th>
							<th>commission</th>
							<th>active</th>
							<th>image</th>
						</thead>
						<tbody>
							@foreach ($pro as $k)
								<tr>
									<td>
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										<li role="separator" class="divider"></li>
										<li><a href="{!! route('product.edit' ,$k->slug) !!}" >edit</a></li>
										<li><a href="{!! route('product.destroy', $k->id) !!}">delete</a></li>

										<li role="separator" class="divider"></li>
									</ul>
								</div>
									</td>
									<td>{!! $k->product !!}</td>
									<td>{!! App\ProductCategory::find($k->id_category)->product_category !!}</td>
									<td>RM {!! number_format($k->retail, 2) !!}</td>
									<td>RM {!! number_format($k->commission, 2) !!}</td>
									<td>{!! ($k->active == 1) ? 'active' : 'inactive' !!}</td>
									<td>
										<?php
												$imge = App\Product::find($k->id)->productimage;
												foreach ($imge as $imu ) {
													echo '<img src="data:'.$imu->mime.';base64, '.$imu->image.'" class="img-responsive img-rounded">';
												}
												
										?>
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
</div>

@endsection


@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});
@endsection