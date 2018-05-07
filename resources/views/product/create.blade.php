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
				{!! Form::open(['route' => 'product.store', 'class' => 'form-horizontal', 'id' => 'form', 'files' => true]) !!}
				<div class="form-group {!! ( count($errors->get('product')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('pr', 'Product :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('product', @$value, ['class' => 'form-control', 'placeholder' => 'Product', 'id' => 'pr']) !!}
					</div>
				</div>
		
				<div class="form-group {!! ( count($errors->get('retail')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('co', 'Retail :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('retail', @$value, ['class' => 'form-control', 'placeholder' => 'Retail in RM', 'id' => 'co']) !!}
					</div>
				</div>
@if(auth()->user()->id_group == 1)
				<div class="form-group {!! ( count($errors->get('commission')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('com', 'Commission :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('commission', @$value, ['class' => 'form-control', 'placeholder' => 'Commission in RM', 'id' => 'com']) !!}
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
							<th>product</th>
							<th>category</th>
							<th>retail</th>
							<th>commission</th>
							<th>active</th>
							<th>image</th>
							<th>action</th>
						</thead>
						<tbody>
							@foreach ($pro as $k)
								<tr>
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
									<td>
										<a href="{!! route('product.edit' ,$k->slug) !!}" >
											<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
										</a>
										<a href="{!! route('product.destroy', $k->slug) !!}" data-id="{!! $k->slug !!}" id="delete_product_<?=$k->slug ?>" title="Delete" class="delete_button">
											<i class="fa fa-trash fa-lg" aria-hidden="true"></i>
										</a>
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
/////////////////////////////////////////////////////////////////////////////////////////
// select2
$('#cat').select2({
	placeholder: 'Please choose'
});

/////////////////////////////////////////////////////////////////////////////////////////
// ajax post delete row
	// readProducts(); /* it will load products when document loads */

	$('.delete_button').click(function(e){
		var productId = $(this).data('id');
		SwalDelete(productId);
		e.preventDefault();
	});
	
	// function readProducts(){
	// 	$('#load-products').load('read.php');
	// }

	function SwalDelete(productId){
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '<i class="fa fa-trash-o" aria-hidden="true"></i>	Yes, delete it!',
			showLoaderOnConfirm: true,
			allowOutsideClick: false,

			preConfirm: function()                {
				return new Promise(function(resolve) {
					$.ajax({
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url: '<?=route('product.destroy', $k->slug)?>',
						type: 'delete',
						data:	{
									id: productId,
									_token : $('meta[name=csrf-token]').attr('content')
								},
						dataType: 'json'
					})
					.done(function(response){
						swal('Deleted!', response.message, response.status);
						// readProducts();
						// $('#delete_product_' + productId).text('imhere').css({"color": "red"});
						$('#delete_product_' + productId).parent().parent().remove();
					})
					.fail(function(){
						swal('Oops...', 'Something went wrong with ajax !', 'error');
					});
				});
			},
		})
		.then((result) => {
			if (result.dismiss === swal.DismissReason.cancel) {
				swal('Cancelled','Your data is safe.','info')
			}
		});
	};

/////////////////////////////////////////////////////////////////////////////////////////
	$("input").keyup(function() {
		tch(this);
	});

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator

$("#form").bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		product: {
			validators: {
				notEmpty: {
					message: 'Please insert product name. '
				},
			}
		},
		retail: {
			validators: {
				notEmpty: {
					message: 'Please insert retail price. '
				},
				greaterThan: {
					value: 0,
					message: 'The retail price should be greater than 0. '
				}
			}
		},
@if(auth()->user()->id_group == 1)
		commission: {
			validators: {
				notEmpty: {
					message: 'Please insert commission. '
				},
				greaterThan: {
					value: 0,
					message: 'The commssion should be greater than 0. '
				}
			}
		},
@endif
		'image[]': {
			validators: {
				notEmpty: {
					message: 'Please select an image'
				},
				file: {
					extension: 'jpeg,jpg,png,bmp',
					type: 'image/jpeg,image/png,image/bmp',
					maxSize: 7990272,   // 3264 * 2448
					message: 'The selected file is not valid. It should be 3264X2448 max dimension. '
				}
			}
		},
		id_category: {
			validators: {
				notEmpty: {
					message: 'Please choose an category for the product. '
				}
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////
@endsection