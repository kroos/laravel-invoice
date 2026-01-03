@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header d-flex justify-content-between">
		<h3 class="my-auto">Invoice List</h3>
		<a href="{!! route('sales.create') !!}" class="btn btn-sm btn-outline-info my-auto">New Invoice</a>
	</div>
	<div class="card-body">
		<div class="col-lg-12 table-responsive" id="load-products">
			<table id="at" class="table table-hover"></table>
		</div>
	</div>
</div>
@endsection

@section('js')
/////////////////////////////////////////////////////////////////////////////////////////
var table = $('#at').DataTable({
	"lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
	columnDefs: [
		{ type: 'date', 'targets': [1] },
	// 	// { type: 'time', 'targets': [6] },
	],
	order: [[0, 'asc'], [1, 'asc']],
	responsive: true,
	autoWidth: true,
	fixedHeader: true,
	// dom: 'Bfrtip',
	ajax: {
		type: 'GET',
		url: '{{ route('geSales') }}',
		dataSrc: '',
		data: function(da){
			da._token = '{!! csrf_token() !!}'
		},
	},
	columns: [
		{ data: 'id', title: 'ID', defaultContent: '-', },
		@if(auth()->user()->id_group == 1)
			{ data: 'invuser.name', title: 'Sales Person', defaultContent: '-', },
		@endif
		{
			data: 'date_sale',
			title: 'Date',
			defaultContent: '-',
			render: function(data){
				return moment(data).format('D MMM YYYY');
			}
		},
		{ data: 'invuser.name', title: 'Name', defaultContent: '-', },
		{
			data: null,
			 title: 'Total Commission',
			 defaultContent: '-',
			 render: function (data, type, row) {
			 	if (!row.invitems || !row.invitems.length) return '0.00';

			 	let total = row.invitems.reduce((sum, item) => {
			 		return sum + (parseFloat(item.commission) * parseInt(item.quantity));
			 	}, 0);

			 	return total.toFixed(2);
			 }
		},
		{
			data: null,
			title: 'Total Invoice',
			defaultContent: '-',
			render: function (data, type, row) {
				if (!row.invitems || !row.invitems.length) return '0.00';

				let total = row.invitems.reduce((sum, item) => {
					if (parseInt(item.id_product) === 37) return sum;

					return sum + (parseFloat(item.retail) * parseInt(item.quantity));
				}, 0);
				let totalInv = total.toFixed(2);;
				return total.toFixed(2);
			}
		},
		{
			data: null,
			title: 'Total Payment',
			defaultContent: '-',
			 render: function (data, type, row) {
			 	if (!row.salespayment || !row.salespayment.length) return '0.00';

			 	let total = row.salespayment.reduce((sum, item) => {
			 		return sum + (parseFloat(item.amount));
			 	}, 0);
				let totaPay = total.toFixed(2);;
			 	return total.toFixed(2);
			 }
		},
		{
			data: null,
			title: 'Status',
			defaultContent: '-',
			orderable: false,
			searchable: false,
			render: function (data, type, row) {

				// ----- total invoice -----
				let totalInv = row.invitems?.reduce((sum, item) => {
					if (parseInt(item.id_product) === 37) return sum;
					return sum + (parseFloat(item.retail) * parseInt(item.quantity));
				}, 0) || 0;

				// ----- total payment -----
				let totaPay = row.salespayment?.reduce((sum, item) => {
					return sum + parseFloat(item.amount);
				}, 0) || 0;

				let gr = totaPay - totalInv;

				let btnClass = gr < 0 ? 'btn-danger' : 'btn-success';
				let icon     = gr < 0
				? 'fa-solid fa-credit-card'
				: 'fa-regular fa-money-bill-1';

				return `
				<div type="button" class="btn btn-sm ${btnClass}">
					<i class="${icon}"></i>
				</div>
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
						<a href="{{ url('sales') }}/${data}/edit" class="btn btn-sm btn-outline-info" title="Edit">
							<i class="fa-regular fa-pen-to-square"></i>
						</a>

						<button type="button" data-id="${data}" title="Delete" class="delete_button btn btn-sm btn-danger">
							<i class="fas fa-trash fa-lg"></i>
						</button>
					</div>

					<div class="btn-group btn-group-sm" role="group">
						<a href="{{ url('printpdf') }}/${data}" target="_blank" class="btn btn-sm btn-outline-info" title="Print PDF">
							<i class="fa-regular fa-file-pdf"></i>
						</a>

						<a href="{{ url('emailpdf') }}/${data}" class="btn btn-sm btn-outline-info" title="Send Email">
							<i class="fa-regular fa-envelope-open"></i>
						</a>
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

		preConfirm: function()                {
			return new Promise(function(resolve) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: `{{ url('sales')}}/${productId}`,
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
					$('#delete_product_' + productId).text('imhere').css({"color": "red"});
					$('#delete_product_' + productId).parent().parent().remove();
				})
				.fail(function(){
					swal.fire('Oops...', 'Something went wrong with ajax!', 'error');
				});
			});
		},
	})
	.then((result) => {
		if(result.dismiss === swal.DismissReason.cancel) {
			swal.fire('Cancelled', 'Your data is safe', 'info');
		}
	});
}

/////////////////////////////////////////////////////////////////////////////////////////
@endsection
