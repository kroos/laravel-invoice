@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('category.store') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="mb-2 needs-validation" enctype="multipart/form-data">
	@csrf
	<div class="card">
		<div class="card-header">Add Product Category</div>
		<div class="card-body">
			@include('category._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1">
				<i class="fa fa-save"></i> Submit
			</button>
			<a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>

<div class="card">
	<div class="card-header">Product Category List</div>
	<div class="card-body table-responsive">
		<table id="at" class="table table-border table-hover "></table>
	</div>
</div>
@endsection


@section('jquery')
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
		url: '{{ route('getProducts') }}',
		dataSrc: '',
		data: function(da){
			da._token = '{!! csrf_token() !!}'
		},
	},
	columns: [
		{ data: 'id', title: 'ID', defaultContent: '-', },
		{ data: 'product_category', title: 'Product Category', defaultContent: '-', },
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
			data: 'id',
			title: '#',
			orderable: false,
			searchable:false,
			render: function(data){
				return `
					<div class="btn-group btn-group-sm" role="group">
						<a href="{{ url('product') }}/edit/${data}" class="btn btn-sm btn-outline-info" title="Edit">
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
		confirmButtonText: 'Yes, delete it!',
		showLoaderOnConfirm: true,
		allowOutsideClick: false,

		preConfirm: function(){
			return new Promise(function(resolve) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: '{{ url('category') }}/${productId}',
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
// bootstrap validator
$("#form").bootstrapValidator({
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
