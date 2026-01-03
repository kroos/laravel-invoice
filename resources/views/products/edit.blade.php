@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('products.update', $product) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card mb-2">
		<div class="card-header">Edit Product</div>
		<div class="card-body">
			@include('products._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
			<a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>



<div class="card">
	<div class="card-header">Product Image List</div>
	<div class="card-body">
		<div class="col-sm-12 table-responsive">
			<table id="at" class="table table-border table-hover "></table>
			</div>
		</div>
</div>
@endsection


@section('js')
////////////////////////////////////////////////////////////////////////////////////
@include('products._js')

////////////////////////////////////////////////////////////////////////////////////
var table = $('#at').DataTable({
	"lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	// columnDefs: [
	// 	{ type: 'date', 'targets': [4,5,6] },
	// 	// { type: 'time', 'targets': [6] },
	// ],
	order: [[0, 'asc'], [1, 'asc']],
	responsive: true,
	autoWidth: true,
	fixedHeader: true,
	// dom: 'Bfrtip',
	ajax: {
		type: 'GET',
		url: '{{ route('getProductsdT') }}',
		dataSrc: '',
		data: function(da){
			da._token = '{{ csrf_token() }}',
			da.id = '{{ $product->id }}'
		},
	},
	columns: [
		{
			data: null,
			title: 'ID',
			defaultContent: '-',
			render: function (data, type, row) {
				return row.productimage[0].id;
			}
		},
		{
			data: null,
			title: 'Image',
			defaultContent: '-',
			render: function (data, type, row) {
				return `
					<img src="data:${row.productimage[0].mime};base64, ${row.productimage[0].image}" class="img-responsive img-rounded">
				`;
			}
		},
		{
			data: 'productimage[0].id',
			title: '#',
			orderable: false,
			searchable:false,
			render: function(data){
				return `
					<div class="btn-group btn-group-sm" role="group">
						<a href="{{ url('productimages') }}/${data}/edit" class="btn btn-sm btn-outline-info" title="Edit">
							<i class="fa-regular fa-pen-to-square"></i>
						</a>

						<button type="button" data-id="${data}" title="Delete" class="remove btn btn-sm btn-danger">
							<i class="fas fa-trash fa-lg"></i>
						</button>
					</div>
				`;
			}
		}
	],
	initComplete: function(settings, response) {
		console.log(response); // This runs after successful loading
	}
});


////////////////////////////////////////////////////////////////////////////////////
// ajax post delete row
$(document).on('click', '.remove', function(e){
	var productId = $(this).data('id');
	SwalDelete(productId);
	e.preventDefault();
});

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
					url: `{{ url('productimages') }}/${productId}`,
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
