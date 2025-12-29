@extends('layout.master')

@section('content')
	<div class="card">
		<div class="card-header">Customers List</div>
		<div class="card-body">
			<div class="table-responsive">

				<table id="at" class="table table-hover"></table>

			</div>
		</div>
	</div>
@endsection

@section('jquery')
/////////////////////////////////////////////////////////////////////////////////////////
var table = $('#at').DataTable({
	// columnDefs: [
	// 	{ type: 'date', 'targets': [4,5,6] },
	// 	// { type: 'time', 'targets': [6] },
	// ],
	order: [[0, 'asc'], [1, 'asc']],
	responsive: true,
	autoWidth: true,
	fixedHeader: true,
	dom: 'Bfrtip',
	ajax: {
		type: 'GET',
		url: '{{ route('getCustomers') }}',
		dataSrc: '',
		data: function(da){
			da._token = '{!! csrf_token() !!}'
		},
	},
	columns: [
		{ data: 'id', title: 'ID', defaultContent: '-', },
		{ data: 'client', title: 'Name', defaultContent: '-', },
		{ data: 'client_address', title: 'Address', defaultContent: '-', },
		{ data: 'client_poskod', title: 'Postcode', defaultContent: '-', },
		{ data: 'client_phone', title: 'Phone', defaultContent: '-', },
		{ data: 'client_email', title: 'Email', defaultContent: '-', },
		{
			data: 'id',
			title: '#',
			orderable: false,
			searchable:false,
			render: function(data){
				return `
					<div class="btn-group btn-group-sm" role="group">
						<a href="{{ url('customers') }}/edit/${data}" class="btn btn-sm btn-outline-info" title="Edit">
							<i class="fa-regular fa-pen-to-square"></i>
						</a>

						<button type="button" data-id="${data}" title="Delete" class="delete_button btn btn-sm btn-danger">
							<i class="fas fa-trash fa-lg"></i>
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
					url: '{{ url('customers') }}/${productId}',
					type: 'DELETE',
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
@endsection
