@extends('layout.master')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between">
		<h3 class="my-auto">User list</h3>
		<a href="{{ route('user.create') }}" class="my-auto btn btn-sm btn-outline-primary">New User </a>
	</div>
	<div class="card-body">
		<table id="at" class="table"></table>
	</div>
	<div class="card-footer">
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
		url: '{{ route('getUser') }}',
		data: function(da){
			da._token = '{!! csrf_token() !!}'
		},
		dataSrc: function (json) {
			let rows = [];

			json.forEach(group => {
				group.users.forEach(user => {
					rows.push({
						group_id: group.id,
						group: group.group,
						user_id: user.id,
						name: user.name,
						slug: user.slug,
						username: user.username,
						email: user.email,
						color: user.color
					});
				});
			});

			return rows;
		}
	},
	columns: [
		{ data: 'user_id', title: 'ID' },
		{ data: 'group', title: 'Group' },
		{ data: 'name', title: 'Name' },
		{ data: 'username', title: 'Username' },
		{ data: 'email', title: 'Email' },
		{
			data: 'color',
			title: 'Color',
			orderable: false,
			searchable:false,
			render: function(data,type,row){
				return `
					<span class="badge"
					style="background:${data}; color:#fff;">
					${data}
				</span>
				`;
			}
		},
		{
			data: 'user_id',
			title: '#',
			orderable: false,
			searchable:false,
			render: function(data,type,row){
				if(data == 1){
					var del = 0;
				} else {
					var del = data;
				}
				return `
					<div class="btn-group btn-group-sm" role="group">
						<a href="{{ url('user') }}/edit/${row.slug}" class="btn btn-sm btn-outline-info" title="Edit">
							<i class="fa-regular fa-pen-to-square"></i>
						</a>

						<button type="button" data-id="${del}" title="Delete" class="delete_button btn btn-sm btn-danger">
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
					url: '{{ url('user') }}/${productId}',
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
					//$('#delete_product_' + productId).parent().parent().remove();
					table.ajax.reload();
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
