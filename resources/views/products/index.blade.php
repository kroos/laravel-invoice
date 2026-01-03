@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between">
		<he class="my-auto">Product List</he>
		<a href="{!! route('products.create') !!}" class="btn btn-sm btn-outline-info my-auto">New Product</a>
	</div>
	<div class="card-body table-responsive">

		<table id="at" class="table table-border table-hover "></table>

	</div>
	<div class="card-footer d-flex justify-content-end">
	</div>
</div>
@endsection


@section('js')
/////////////////////////////////////////////////////////////////////////////////////////
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
			da._token = '{!! csrf_token() !!}'
		},
	},
	columns: [
		{ data: 'id', title: 'ID', defaultContent: '-', },
		{ data: 'category.product_category', title: 'Category', defaultContent: '-', },
		{ data: 'product', title: 'Product', defaultContent: '-', },
		{
			data: 'retail',
			title: 'Retail',
			defaultContent: '-',
			render: function (data, type, row) {
			 	return data;
			}
		},
		{
			data: 'commission',
			title: 'Commission',
			defaultContent: '-',
			 render: function (data, type, row) {
			 	return data;
			}
		},
		{
			data: 'active',
			title: 'Active',
			defaultContent: '-',
			 render: function (data, type, row) {
			 	if(data == 1){
			 		var act = 'Active';
			 		var clas = 'text-white bg-success';
			 	} else {
			 		var act = 'Inactive';
			 		var clas = 'text-white bg-danger';
			 	}
			 	return `
			 		<span class="${clas}">${act}</span>
			 	`;
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
			data: 'slug',
			title: '#',
			orderable: false,
			searchable:false,
			render: function(data){
				return `
					<div class="btn-group btn-group-sm" role="group">
						<a href="{{ url('products') }}/${data}/edit" class="btn btn-sm btn-outline-info" title="Edit">
							<i class="fa-regular fa-pen-to-square"></i>
						</a>

						<button type="button" data-id="${data}" title="Delete" class="delete_button btn btn-sm btn-danger">
							<i class="fas fa-trash"></i>
						</button>
					</div>
				`
			}
		}
	],
	initComplete: function(settings, response) {
		console.log(response); // This runs after successful loading
	}
});

/////////////////////////////////////////////////////////////////////////////////////////
// ajax post delete row
$(document).on('click', '.delete_button', function(e){
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
		confirmButtonText: '<i class="fas fa-trash-o"></i>	Yes, delete it!',
		showLoaderOnConfirm: true,
		allowOutsideClick: false,

		preConfirm: function() {
			return new Promise(function(resolve) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: `{{ url('products.destroy') }}/${productId}`,
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
			});
		},
	})
	.then((result) => {
		if (result.dismiss === swal.DismissReason.cancel) {
			swal.fire('Cancelled','Your data is safe.','info')
		}
	});
};

////////////////////////////////////////////////////////////////////////////////////
@endsection
