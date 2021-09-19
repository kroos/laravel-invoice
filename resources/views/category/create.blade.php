@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

	{!! Form::open(['route' => 'category.store', 'class' => 'form-horizontal', 'id' => 'form']) !!}
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Product Category</div>
			<div class="panel-body">
				<div class="col-lg-12">
					<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('cate', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::text('category', @$value, ['class' => 'form-control', 'placeholder' => 'Category', 'id' => 'cate']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									{!! Form::checkbox('active', 1, @$value) !!}&nbsp;Aktif
									{!! Form::hidden('active', 0) !!}
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
							<th>category</th>
							<th>active</th>
							<th>action</th>
						</thead>
						<tbody>
							@foreach ($cate as $k)
							<tr>
								<td>{!! $k->product_category !!}</td>
								<td>{!! ( $k->active == NULL ) ? 'inactive' : 'active' !!}</td>
								<td>
									<a href="{!! route('category.edit', $k->id) !!}" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
									<a href="{!! route('category.destroy', $k->id) !!}"  data-id="{!! $k->id !!}" id="delete_product_<?=$k->id ?>" title="Delete" class="delete_button"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
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

@endsection


@section('jquery')
/////////////////////////////////////////////////////////////////////////////////////////
// ajax post delete row
	// readProducts(); /* it will load products when document loads */

	$(document).on('click', '.delete_button', function(e){
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
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			allowOutsideClick: false,

			preConfirm: function(){
				return new Promise(function(resolve) {
					$.ajax({
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url: '<?=route('category.destroy', $k->id)?>',
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
						// $('#delete_product_' + productId).text('imhere').css({"color": "red"});
						$('#delete_product_' + productId).parent().parent().remove();
					})
					.fail(function(){
						swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
					});
					console.log()
				});
			},
		});
	}

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
		category: {
			validators: {
				notEmpty: {
					message: 'Please insert category name. '
				},
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////
@endsection