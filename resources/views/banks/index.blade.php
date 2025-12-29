@extends('layout.master')

@section('content')
	<div class="card card-default">
		<div class="card-header d-flex justify-content-between">
			<span>Banks and Financial Institutions</span>
			<a href="{!! route('banks.create') !!}" class="btn btn-sm btn-info">New Bank</a>
		</div>
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
		url: '{{ route('getBanksT') }}',
		dataSrc: '',
		data: function(da){
			da._token = '{!! csrf_token() !!}'
		},
	},
	columns: [
		{ data: 'id', title: 'ID', defaultContent: '-', },
		{ data: 'bank', title: 'Bank', defaultContent: '-', },
		{ data: 'city', title: 'City', defaultContent: '-', },
		{ data: 'swift_code', title: 'Swift Code', defaultContent: '-', },
		{ data: 'account', title: 'Account', defaultContent: '-', },
		{
			data: null,
			title: 'Status',
			defaultContent: '-',
			render: function(data, type, row){
				if(row.active == 1) {
					var clas = 'btn-success';
					var word = 'Active';
				} else {
					var clas = 'btn-danger';
					var word = 'Inactive';
				}

				return `
					<a href="{{ url('banks') }}/active/${row.id}" class="btn btn-sm text-white ${clas}">${word}</a>
				`;
			}
		},
		{
			data: 'id',
			title: '#',
			orderable: false,
			searchable:false,
			render: function(data, type, row){
				return `
					<div class="btn-group btn-group-sm" role="group">
						<a href="{{ url('banks') }}/edit/${data}" class="btn btn-sm btn-outline-info" title="Edit">
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
					url: '{{ url('banks') }}/${productId}',
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
