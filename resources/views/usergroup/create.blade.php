@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('usergroup.store') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	<div class="card mb-3">
		<div class="card-head">Add User Group</div>
		<div class="card-body">

			<div class="form-group row m-1 @error('group') has-error @enderror">
				<label for="ug" class="col-form-label col-sm-4">User Group : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="group" value="{{ old('group') }}" id="ug" class="form-control form-control-sm @error('group') is-invalid @enderror" placeholder="User Group">
					@error('group')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>

			</div>
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1"><i class="fa fa-save"></i> Submit</button>
			<a href="{{ route('user.create') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>

<div class="card">
	<div class="card-header">User Groups List</div>
	<div class="card-body">
		<div class="table-responsive">

			<table id="at" class="table table-border table-hover "></table>

		</div>
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
	dom: 'Bfrtip',
	ajax: {
		type: 'GET',
		url: '{{ route('getUser') }}',
		data: function(da){
			da._token = '{!! csrf_token() !!}'
		},
		dataSrc: '',
	},
	columns: [
		{ data: 'id', title: 'ID', defaultContent: '-', },
		{ data: 'group', title: 'Group', defaultContent: '-', },
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
					url: '{{ url('usergroup') }}/${productId}',
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
