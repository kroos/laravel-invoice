@extends('layout.master')

@section('content')
	<div class="row"><p><a href="{!! route('product.create') !!}" class="btn btn-info">Back to products</a></p></div>
	@include('layout.errorform')
	@include('layout.info')

	{!! Form::model($product, ['route' => ['product.update', $product->slug], 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'form']) !!}

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
								{!! Form::text('product', $product->product, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']) !!}
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
										{!! Form::hidden('active', 0) !!}
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
										<td>
											<button href="{!! route('productimage.destroy', $k->id) !!}" id="remove_image_{{ $k->id }}" data-id="{{ $k->id }}" class="btn btn-danger remove">
												<i class="fa fa-trash fa-lg" aria-hidden="true"></i>
											</button>
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
////////////////////////////////////////////////////////////////////////////////////
// select2
$('#ug').select2({
	placeholder: 'Please Choose'
});

////////////////////////////////////////////////////////////////////////////////////
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
// ajax post delete row
	// readProducts(); /* it will load products when document loads */

	$('.remove').click(function(e){
		var productId = $(this).data('id');
		SwalDelete(productId);
		e.preventDefault();
	});
	
	// function readProducts(){
	// 	$('#load-products').load('read.php');
	// }

	function SwalDelete(productId){
		swal.fire({
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
						url: '<?=route('productimage.destroy')?>',
						type: 'delete',
						data:	{
									id: productId,
									_token : $('meta[name=csrf-token]').attr('content')
								},
						dataType: 'json'
					})
					.done(function(response){
						swal.fire('Deleted!', response.message, response.status);
						// readProducts();
						// $('#remove_image_' + productId).text('imhere').css({"color": "red"});
						$('#remove_image_' + productId).parent().parent().remove();
					})
					.fail(function(){
						swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
					});
				});
			},
		})
		.then((result) => {
			if (result.dismiss === swal.DismissReason.cancel) {
				swal.fire('Cancelled','Your data is safe.','info')
			}
		});
	};

/////////////////////////////////////////////////////////////////////////////////////////

@endsection