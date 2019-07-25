@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Customers List</div>
		<div class="panel-body">
			<div class="col-lg-12 table-responsive">

				<table id="example" class="table table-hover">
					<thead>
						<th>customer</th>
						<th>address</th>
						<th>postcode</th>
						<th>phone</th>
						<th>email</th>
						<th>action</th>
					</thead>
					<tbody>
						<?php
							if ( auth()->user()->id_group == 1 ) {
								$inv = App\Customers::withTrashed()->get();
							} else {
								$inv = App\Customers::all();
							}
							
							$inv = App\Customers::all();
						?>
						@foreach($inv as $in)
						<tr>
							<td>{!! $in->client !!}</td>
							<td>{!! $in->client_address !!}</td>
							<td>{!! $in->client_postcode !!}</td>
							<td>{!! $in->client_phone !!}</td>
							<td>{!! $in->client_email !!}</td>
							<td>
								<a href="{!! route('customers.edit', $in->id) !!}" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
								<a href="{!! route('customers.destroy', $in->id) !!}" data-id="{!! $in->id !!}" id="delete_product_<?=$in->id ?>" title="Delete" class="delete_button"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

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
		swal({
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
						url: '<?=route('customers.destroy', $in->id)?>',
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
					console.log()
				});
			},
		});
	}

/////////////////////////////////////////////////////////////////////////////////////////
@endsection