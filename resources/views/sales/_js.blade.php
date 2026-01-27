////////////////////////////////////////////////////////////////////////////////////
// date input helper
	$('#da').datepicker({
		dateFormat: 'yy-mm-dd',
	})
	.on('change', function(e) {
		$('#form').bootstrapValidator('revalidateField', 'date_sale');
	});

////////////////////////////////////////////////////////////////////////////////////
function getSelectedProductIds() {
	let ids = [];

	$('.series').each(function () {
		const val = $(this).val();
		if (val) ids.push(val);
	});

	// return ids??[];

	$(`.series`).select2({
		theme: 'bootstrap-5',
		placeholder: 'Please choose',
		allowClear: true,
		closeOnSelect: true,
		width: '100%',
		ajax: {
			url: '{{ route('getProducts') }}',
			type: 'GET',
			dataType: 'json',
			delay: 250,											// Delay to reduce server requests
			data: function (params) {
				return {
					_token: '{!! csrf_token() !!}',
					search: params.term,				// Search query
					idIn: ids??[],
				}
			},
			processResults: function (data) {
				return {
					results: data.map(function (category) {
						return {
							// id: category.id,
							text: category.product_category,
							disabled: true,
							children:category.product.map(function (product) {
								return {
									id: product.id,
									text: product.product,
									commission: product.commission,
									retail: product.retail,
								};
							})

						}
					})
				};
			}

		},
	});

}

///////////////////////////////////////////////////////////////////////////////
/////
function getSelectedBanks() {
	let ids = [];

	$('.bank').each(function () {
		const val = $(this).val();
		if (val) ids.push(val);
	});

	$(`.bank`).select2({
		theme: 'bootstrap-5',
		placeholder: 'Please choose',
		allowClear: true,
		closeOnSelect: true,
		width: '100%',
		ajax: {
			url: '{{ route('getBanks') }}',
			type: 'GET',
			dataType: 'json',
			delay: 250,											// Delay to reduce server requests
			data: function (params) {
				return {
					_token: '{!! csrf_token() !!}',
					search: params.term,				// Search query
					idIn: ids??[],
				}
			},
			processResults: function (data) {
				return {
					results: data.map(function (banks) {
						return {
							id: banks.id,
							text: banks.bank,
						}
					})
				};
			}

		},
	});

}

////////////////////////////////////////////////////////////////////////////////////
$('#datep').datepicker({
	autoclose:true,
	format:'yyyy-mm-dd',
	todayHighlight : true
})
.on('changeDate show', function(e) {
	$('#form').bootstrapValidator('revalidateField', 'pay[][date_payment]');
});

////////////////////////////////////////////////////////////////////////////////////
// slip serial number : add and remove row
$("#serial_wrap").remAddRow({
	addBtn: "#serial_add",
	maxFields: 20,
	removeClass: "serial_remove",
	fieldName: "serial",
	rowSelector: "serial",

	swal: {
		options: {
			title: 'Are you sure?',
			text: 'It will be deleted permanently!',
		},
		ajax: {
			url: `{{ url('slippostage') }}`,
			method: 'DELETE',
			dataType: 'json',
			data: {
				_token: `{{ csrf_token() }}`,
			},
		}
	},

	validator: {
		form: '#form',
		fields: {
			'[tracking_number]': {
				validator: {
					notEmpty: {
						message: 'Please insert tracking number/bill number/receipt number.'
					}
				}
			},

		},
	},

	rowTemplate: (i, name) => `
		<div class="my-1 serial row" id="serial_${i}">
			<div class="col-sm-1 m-0 ">
				<input type="hidden" name="${name}[${i}][id]" value="">
				<button type="button" class="btn btn-sm btn-outline-danger serial_remove" data-id="${i}">
					<i class="fas fa-trash"></i>
				</button>
			</div>
			<div class="form-group col-sm-11 row m-0 @error('serial.*.tracking_number') has-error @enderror">
				<label for="catel${i}" class="col-form-label col-sm-5">Receipt Or Tracking Postage : </label>
				<div class="col-sm-7 my-auto">
					<input type="text" name="${name}[${i}][tracking_number]" value="" id="catel${i}" class="form-control form-control-sm @error('serial.*.tracking_number') is-invalid @enderror" placeholder="Receipt Or Tracking Postage">
					@error('serial.*.tracking_number')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
		</div>
	`,
	onAdd: (i, e, $r, name) => {
	},
	onRemove: async (i, event, $row, name) => {
	}
});

////////////////////////////////////////////////////////////////////////////////////
// helper tax
$(document).on('change', '#taxs', function () {
	var se=0;
	var arr = [];
	$('#taxs :selected').each(function(){
		se += ((($(this).data('amount')) * 1000) / 1000);
		arr.push( $(this).data('amount') );
	});
	var er = 0;
	for (var i = arr.length - 1; i >= 0; i--) {
		er += ((arr[i] * 100) / 100);
	}
	console.log(er);
	console.log(se);
	$('#total_tax').text( er );

	// update each time user change the value
	update_tamount();
	update_balance();
});

//////////////////////////////////////////////////////////////////////////
//////////
// selecting series will auto populate comm and rate
$(document).on('select2:select', '#custsel', function (e) {
	const data = e.params.data; // ✅ Select2 selected item

	var client = $('#client');
	var address = $('#address');
	var poskod = $('#poskod');
	var email = $('#email');
	var phone = $('#phone');

	$(client).text( data.client || '' );
	$(address).text( data.client_address || '' );
	$(poskod).text( data.client_poskod || '' );
	$(email).text( data.client_email || '' );
	$(phone).text( data.client_phone || '' );
});

////////////////////////////////////////////////////////////////////////////////////
// helper NaN
function num(obj) {
	var mystring = obj.value;
	if( !isNaN(mystring) == false ){
		mystring = 0;
	}
	return mystring;
}

//////////////////////////////////////////////////////////////////////////
//////////
// adding and removing invoice
$("#invItems_wrap").remAddRow({
	addBtn: "#invItems_add",
	maxFields: 20,
	removeClass: "invItems_remove",
	fieldName: "inv",
	rowSelector: "invItems",

	swal: {
		options: {
			title: 'Are you sure?',
			text: 'It will be deleted permanently!',
		},
		ajax: {
			url: `{{ url('salesitems') }}`,
			method: 'DELETE',
			dataType: 'json',
			data: {
				_token: `{{ csrf_token() }}`,
			},
		}
	},

	validator: {
		form: '#form',
		fields: {

			'[id_product]': {
				validator: {
					notEmpty: {
						message: 'Please choose an item. '
					}
				}
			},
			'[commission]': {
				validator: {
					notEmpty: {
						message: 'Please insert commission for this item. '
					},
					greaterThan: {
						value: 0,
						message: 'Commission must be equal or greater than 0. '
					},
				}
			},
			'[retail]': {
				validator: {
					notEmpty: {
						message: 'Please insert retail price for this item. '
					},
					greaterThan: {
						value: 0,
						message: 'Retail price must be equal or greater than 0. '
					},
				}
			},
			'[quantity]': {
				validator: {
					notEmpty: {
						message: 'Please insert quantity for this item. '
					},
					greaterThan: {
						value: 0,
						message: 'Quantity must be equal or greater than 0. '
					},
				}
			},

		},
	},

	rowTemplate: (i, name) => `
		<div class="col-sm-12 row m-0 my-1 invItems" id="invItems_${i}">

			<div class="col-sm-1 m-0 my-auto">
				<input type="hidden" name="${name}[${i}][id]" value="">
				<button class="btn btn-sm btn-outline-danger remove_field invItems_remove" data-id="0" type="button"><i class="fas fa-trash"></i></button>
			</div>

			<div class="col-sm-5 m-0 my-auto @error('inv.*.id_product') has-error @enderror">
				<select name="${name}[${i}][id_product]" id="series_${i}" class="series form-select form-select-sm @error('inv.*.id_product') is-invalid @enderror">
					<option value="">Please Choose</option>
				</select>
			</div>

			<div class="col-sm-1 form-group row m-0 my-auto @error('inv.*.commission') has-error @enderror">
				<input type="{{(\Auth::user()->id_group == 1)?'text':'hidden'}}" name="${name}[${i}][commission]" class="comm form-control form-control-sm @error('inv.*.commission') is-invalid @enderror" placeholder="Commission (RM)" />
			</div>

			<div class="col-sm-2 form-group row m-0 my-auto @error('inv.*.retail') has-error @enderror">
				<input type="text" name="${name}[${i}][retail]" class="rate form-control form-control-sm @error('inv.*.retail') is-invalid @enderror" placeholder="Retail (RM)"/>
			</div>

			<div class="col-sm-1 form-group row m-0 my-auto @error('inv.*.quantity') has-error @enderror">
				<input type="text" name="${name}[${i}][quantity]" class="quan form-control form-control-sm @error('inv.*.quantity') is-invalid @enderror" placeholder="Quantity" />
			</div>

			<div class="col-sm-2 m-0 my-auto text-right">
				<span class="total_price">0.00</span>
			</div>
		</div>
	`,
	onAdd: (i, e, $r, name) => {
		getSelectedProductIds();
	},
	onRemove: async (i, event, $row, name) => {
		// update total amount
		update_tamount();
		update_balance();
	}
});

////////////////////////////////////////////////////////////////////////////////////
// selecting series will auto populate comm and rate
$(document).on('select2:select', '.series', function (e) {
	const data = e.params.data; // ✅ Select2 selected item

	const $row = $(this).closest('.rowinvoice');

	const $comm  = $row.find('.comm');
	const $rate  = $row.find('.rate');
	const $quan  = $row.find('.quan');
	const $total = $row.find('.total_price');

	// populate inputs
	$comm.val(data.commission || 0);
	$rate.val(data.retail || 0);

	const qty   = parseFloat($quan.val()) || 0;
	const price = parseFloat(data.retail) || 0;

	$total.text((qty * price).toFixed(2));

	update_tamount();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////
////
// payment add and remove row
$("#payment_wrap").remAddRow({
	addBtn: "#payment_add",
	maxFields: 20,
	removeClass: "payment_remove",
	fieldName: "pay",
	rowSelector: "payment",

	swal: {
		options: {
			title: 'Are you sure?',
			text: 'It will be deleted permanently!',
		},
		ajax: {
			url: `{{ url('payments') }}`,
			method: 'DELETE',
			dataType: 'json',
			data: {
				_token: `{{ csrf_token() }}`,
			},
		}
	},

	validator: {
		form: '#form',
		fields: {

			'[id_bank]': {
				validator: {
					notEmpty: {
						message: 'Please choose payment bank. '
					}
				}
			},
			'[date_payment]': {
				validator: {
					notEmpty: {
						message: 'Please insert payment date. '
					},
					date: {
						format: 'YYYY-MM-DD',
						message: 'The date format is not valid. '
					},
				}
			},
			'[amount]': {
				validator: {
					notEmpty: {
						message: 'Please insert payment amount. '
					},
					greaterThan: {
						value: 1,
						message: 'Amount must be equal or greater than 1. '
					},
				}
			},

		},
	},

	rowTemplate: (i, name) => `
		<div class="col-sm-12 row my-1 payment" id="payment_${i}">
			<div class="col-sm-1 m-0 my-auto">
			<input type="hidden" name="${name}[${i}][id]" value="">
				<button data-id="${i}" class="btn btn-sm btn-outline-danger payment_remove" type="button">
					<i class="fas fa-trash"></i>
				</button>
			</div>
			<div class="col-sm-6 form-group m-0 my-auto @error('pay.*.id_bank') has-error @enderror">
				<select name="${name}[${i}][id_bank]" class="form-control bank"></select>
			</div>
			<div class="col-sm-3 form-group m-0 my-auto @error('pay.*.date_payment') has-error @enderror">
				<input type="text" name="${name}[${i}][date_payment]" class="form-control datep" id="datep${i}" placeholder="Date Payment"/>
			</div>
			<div class="col-sm-2 form-group m-0 my-auto @error('pay.*.amount') has-error @enderror">
				<input type="text" name="${name}[${i}][amount]" class="pamount form-control" placeholder="Amount (RM)"/>
			</div>
		</div>
	`,
	onAdd: (i,e, $r, name) => {
		// console.log('Personnel added', i, $r)
		getSelectedBanks();

		$(`.datep`).datepicker({
			dateFormat: 'yy-mm-dd',
		})
		.on('change', function(e) {
			// $('#form').bootstrapValidator('revalidateField', $r.find(`name="${name}[${i}][date_payment]"`) );
		});
		update_tamount();
		update_balance();
	},
	onRemove: async (i, event, $r, name) => {
		getSelectedBanks();
		update_tamount();
		update_balance();
	}
});

/////////////////////////////////////////////////////////////////////////////////
///
// keyup on input rate to sum up all the price
$(document).on('keyup', '.rate', function () {
	var comm = $(this).parent().parent().children().children('.comm');
	var rate = $(this).parent().parent().children().children('.rate');
	var quan = $(this).parent().parent().children().children('.quan');
	var total_price = $(this).parent().parent().children().children('.total_price');

	// check if its (Not A Number)
	// console.log( num( this ) );

	// $(total_price).text( (($(rate).val() * 10) * ($(quan).val() * 10)) / 100 );
	$(total_price).text( (((num( this ) * 10) * ($(quan).val() * 10)) / 100).toFixed(2) );

	update_tamount();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// keyup on input quan to sum up all the price
$(document).on('keyup', '.quan', function () {
	var comm = $(this).parent().parent().children().children('.comm');
	var rate = $(this).parent().parent().children().children('.rate');
	var quan = $(this).parent().parent().children().children('.quan');
	var total_price = $(this).parent().parent().children().children('.total_price');

	// check if its (Not A Number)
	// console.log( num( this ) );

	// $(total_price).text( (($(rate).val() * 10) * ($(quan).val() * 10)) / 100 );
	$(total_price).text( ((($(rate).val() * 10) * (num( this ) * 10)) / 100).toFixed(2) );

	update_tamount();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// keyup on input pamount to sum up all the price
$(document).on('keyup', '.pamount', function () {
	update_tpayment();
	update_balance();
});

////////////////////////////////////////////////////////////////////////////////////
// helper total amount
function update_tamount() {
	var tax = $("#total_tax").text();
	var myNodelist = $(".total_price");
	var ssum = 0;
	var stsum = 0;
	for (var i = myNodelist.length - 1; i >= 0; i--) {
		// myNodelist[i].style.backgroundColor = "red";
		ssum = ((ssum * 100) + (myNodelist[i].innerHTML * 100)) / 100;	//make sure the process is accurate
		// console.log(ssum);
		stsum = ssum + (ssum * ((tax * 100) / 10000));
	}
	$('#total_amount').text( stsum.toFixed(2) );
}

////////////////////////////////////////////////////////////////////////////////////
// helper total payment
function update_tpayment() {
	var myNodelistp = $(".pamount");
	var psum = 0;
	for (var ip = myNodelistp.length - 1; ip >= 0; ip--) {
		// myNodelistp[ip].style.backgroundColor = "red";
		psum = ((psum * 10000) + (myNodelistp[ip].value * 10000)) / 10000;	//make sure the process is accurate
		// console.log(psum);
		// console.log(myNodelistp[ip].value);
	}
	$('#total_payment').text( psum.toFixed(2) );
}

////////////////////////////////////////////////////////////////////////////////////
// helper balance
function update_balance() {
	var ta = $('#total_amount');	// amount invoice
	var tp = $('#total_payment');
	var bal = ( ( $(tp).text() * 10000 ) - ( $(ta).text() * 10000 ) )/10000;

	// console.log($(tp).text());
	if (bal == 0) {
		$('#balance').text( bal.toFixed(2) ).css({"color": "blue"});
	} else {
		if (bal < 0) {
			$('#balance').text( bal.toFixed(2) ).css({"color": "red"});
		} else {
			$('#balance').text( bal.toFixed(2) ).css({"color": "green"});
		}
	}
}

////////////////////////////////////////////////////////////////////////////////////
// delete payment
// 	$('.remove_pay').click(function(e){
// 		var productId = $(this).data('id');
// 		SwalDelete4(productId);
// 		e.preventDefault();
// 	});
//
// 	function SwalDelete4(productId){

//		swal.fire({
//			title: 'Are you sure?',
//			text: "It will be deleted permanently!",
//			type: 'warning',
//			showCancelButton: true,
//			allowOutsideClick: false,
//			showLoaderOnConfirm: true,
//			confirmButtonColor: '#3085d6',
//			cancelButtonColor: '#d33',
//			confirmButtonText: 'Yes, delete it!',
//			preConfirm: function() {
//				return new Promise(function(resolve) {
//					$.ajax({
//						type: 'DELETE',
//						url: `${url}/${dbId}`,
//						data: {
//								_token : `{{ csrf_token() }}`,
//								id: dbId,
//						},
//						dataType: 'json'
//					})
//					.done(function(response){
//						swal.fire('Deleted!', response.message, response.status)
//						.then(function(){
//							// window.location.reload(true);
//							var $option = $row.find(`[name="serial[${i}][tracking_number]"]`);
//							$('#form').bootstrapValidator('removeField', $option);
//							return  true;  // remove only after DB deletion
//							return true;
//						});
//					})
//					.fail(function(){
//						swal.fire('Ajax Error', 'Something went wrong with ajax !', 'error');
//						return false;
//					})
//				});
//			},
//		})
//		.then((result) => {
//			if (result.dismiss === swal.DismissReason.cancel) {
//				swal.fire('Cancelled', 'Your data is safe from delete', 'info');
//				return false;
//			}
//		});

// 	};

////////////////////////////////////////////////////////////////////////////////////
// select 2
$('#taxs, .bank').select2({
	theme: 'bootstrap-5',
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
});

////////////////////////////////////////////////////////////////////////////////////
$(`#us`).select2({
	theme: 'bootstrap-5',
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
	ajax: {
		url: '{{ route('getUser') }}',
		type: 'GET',
		dataType: 'json',
		delay: 250,											// Delay to reduce server requests
		data: function (params) {
			return {
				_token: '{!! csrf_token() !!}',
				search: params.term,				// Search query
				id: `{{ (\Auth::user()->id_group == 2)?\Auth::user()->id:NULL }}`,
			}
		},
		processResults: function (data) {
			return {
				results: data.map(function (category) {
					return {
						// id: category.id,
						text: category.group,
						disabled: true,
						children: category.users.map(function (users) {
							return {
								id: users.id,
								text: users.name,
							};
						})

					}
				})
			};
		}

	},
});
@if(old('id_user', @$sale->id_user))
$.ajax({
	url: `{{ route('getUser') }}`,
	data: {
		id: `{{ old('id_user', @$sale->id_user) }}`
	},
	dataType: 'json'
}).then(data => {
	console.log(data);
	if (!Array.isArray(data)) return;

	data.forEach(group => {
		if (!Array.isArray(group.users)) return;

		group.users.forEach(user => {
			const option = new Option(user.name, user.id, true, true);
			$('#us').append(option);
		});
	});
	$('#us').trigger('change'); // trigger once
});
@endif

////////////////////////////////////////////////////////////////////////////////////
$(`#custsel`).select2({
	theme: 'bootstrap-5',
	placeholder: 'Please choose',
	allowClear: true,
	closeOnSelect: true,
	width: '100%',
	ajax: {
		url: '{{ route('getCustomers') }}',
		type: 'GET',
		dataType: 'json',
		delay: 250,											// Delay to reduce server requests
		data: function (params) {
			return {
				_token: '{!! csrf_token() !!}',
				search: params.term,				// Search query
			}
		},
		processResults: function (data) {
			return {
				results: data.map(function (client) {
					return {
						 id: client.id,
						text: client.client,
						client: client.client,
						client_address: client.client_address,
						client_poskod: client.client_poskod,
						client_email: client.client_email,
						client_phone: client.client_phone,
						client_phone: client.client_phone,
					}
				})
			};
		}

	},
});
@if(old('repeatcust', @$sale?->customer()?->first()?->id_customer))
$.ajax({
	url: `{{ route('getCustomers') }}`,
	data: {
		id: `{{ old('repeatcust', @$sale?->customer()?->first()?->id_customer) }}`
	},
	dataType: 'json'
}).then(data => {
	const item = Array.isArray(data) ? data[0] : data;	// change object to array
	if (!item) return;
	console.log(data.client, item.client);
	const option = new Option(item.client, item.id, true, true);
	$('#custsel').append(option).trigger('change');
});
@endif

////////////////////////////////////////////////////////////////////////////////////
// restore old data tracking_number
@php
	$slipnumber = @$sale?->slipnumber()?->get(['id', 'tracking_number']);
	$itemsArray = $slipnumber?->toArray()??[];
	$oldItemsValue = old('serial', $itemsArray);
	// dd($oldItemsValue);
@endphp

const tracking_number = @json($oldItemsValue);
if (tracking_number.length > 0) {
	tracking_number.forEach(function (jrnl, i) {
		$(".add_serial").trigger('click');

		const $row = $(".serial").eq(i);

		$row.find(`input[name="serial[${i}][id]"]`).val(jrnl.id || '');
		$row.find(`input[name="serial[${i}][tracking_number]"]`).val(jrnl.tracking_number || '');
	});
}

////////////////////////////////////////////////////////////////////////////////////
// restore old data invoice items
@php
	$invoiceItems = @$sale?->invitems()?->with('product')?->get(['id', 'id_product', 'commission', 'retail', 'quantity']);
	$invoiceItemsArray = $invoiceItems?->toArray()??[];
	$oldinvoiceItemsValue = old('serial', $invoiceItemsArray);
	// dd($oldinvoiceItemsValue);
@endphp

const inItems = @json($oldinvoiceItemsValue);
if (inItems.length > 0) {
	inItems.forEach(function (invItems, j) {
		$(".add_field").trigger('click');
		const $row = $(".invItems").eq(j);

		const $id_product = $row.find(`select[name="inv[${j}][id_product]"]`).val(invItems.id_product || '');
		const option1 = new Option(invItems.product.product, invItems.id_product, true, true);
		$id_product.append(option1).trigger('change');

		$row.find(`input[name="inv[${j}][id]"]`).val(invItems.id || '');
		$row.find(`input[name="inv[${j}][commission]"]`).val(invItems.commission || '');
		$row.find(`input[name="inv[${j}][retail]"]`).val(invItems.retail || '');
		$row.find(`input[name="inv[${j}][quantity]"]`).val(invItems.quantity || '');

	});
}

////////////////////////////////////////////////////////////////////////////////////
// restore old data salespayment items
@php
	$salespaymentItems = @$sale?->salespayment()?->with('bank')?->get(['id', 'id_bank', 'date_payment', 'amount']);
	$salespaymentItemsArray = $salespaymentItems?->toArray()??[];
	$oldsalespaymentItemsValue = old('pay', $salespaymentItemsArray);
	// dd($oldsalespaymentItemsValue);
@endphp

const payItems = @json($oldsalespaymentItemsValue);
if (payItems.length > 0) {
	payItems.forEach(function (payItems, j) {
		$("#payment_add").trigger('click');
		const $row = $(".payment").eq(j);

		const $id_product = $row.find(`select[name="pay[${j}][id_bank]"]`).val(payItems.id_bank || '');
		const option1 = new Option(payItems.bank.bank, payItems.id_bank, true, true);
		$id_product.append(option1).trigger('change');

		$row.find(`input[name="pay[${j}][id]"]`).val(payItems.id || '');
		$row.find(`input[name="pay[${j}][date_payment]"]`).val( moment(payItems.date_payment).format('YYYY-MM-DD') || '');
		console.log(moment(payItems.date_payment).format('YYYY-MM-DD'));
		$row.find(`input[name="pay[${j}][amount]"]`).val(payItems.amount || '');
	});
}

//.css({"color": "red", "border": "2px solid red"});

////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$('#form').bootstrapValidator({
	fields: {
		id_user: {
			validators: {
				notEmpty: {
					message: 'Please choose user.'
				},
			}
		},
		date_sale: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					format: 'YYYY-MM-DD',
					message: 'The date format is not valid. '
				}
			}
		},
		'image[]': {
			validators: {
				notEmpty: {
					message: 'Please select an image'
				},
				file: {
					extension: 'jpeg,jpg,png,bmp',
					type: 'image/jpeg,image/png,image/bmp',
					maxSize: 7990272,   // 3264 * 2448
					message: 'The selected file is not valid'
				}
			}
		},
		repeatcust: {
			validators: {
				notEmpty: {
					message: 'Please choose a client'
				}
			}
		},
	}
});

////////////////////////////////////////////////////////////////////////////////////

