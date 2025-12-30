@extends('layout.master')

@section('content')
<div class="card">
	<div class="card-header">Print Report</div>
	<div class="card-body">
		<div class="col-sm-12 row">

			<form method="POST" action="{{ route('printreport.store') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
				@csrf
				<div class="card">
					<div class="card-header">Sales Report</div>
					<div class="card-body">

						<div class="form-group row m-1 @error('from') has-error @enderror">
							<label for="from1" class="col-form-label col-sm-2">From : </label>
							<div class="col-sm-6 my-auto">
								<input type="text" name="from" value="{{ old('from', @$variable->from) }}" id="from1" class="form-control form-control-sm @error('from') is-invalid @enderror" placeholder="From">
								@error('from')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row m-1 @error('to') has-error @enderror">
							<label for="to1" class="col-form-label col-sm-2">To : </label>
							<div class="col-sm-6 my-auto">
								<input type="text" name="to" value="{{ old('to', @$variable->to) }}" id="to1" class="form-control form-control-sm @error('to') is-invalid @enderror" placeholder="To">
								@error('to')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row m-1 @error('user.*') has-error @enderror">
							<label for="seller" class="col-form-label col-sm-2">Merchandiser : </label>
							<div class="col-sm-6 my-auto">
								<select name="user[]" id="seller" class="form-select form-select-sm col-sm-12 @error('user.*') is-invalid @enderror" multiple></select>
								@error('user.*')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-end">
						<button type="submit" class="btn btn-sm btn-outline-primary me-1">
							<i class="fa-regular fa-floppy-disk"></i> Submit
						</button>
						<a href="{{-- route('banks.index') --}}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
					</div>
				</div>
			</form>




			<form method="POST" action="{{ route('printreport.audit') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
				@csrf
				<div class="card">
					<div class="card-header">Audit</div>

					<div class="card-body">

						<div class="form-group row m-1 @error('from1') has-error @enderror">
							<label for="from2" class="col-form-label col-sm-2">From : </label>
							<div class="col-sm-6 my-auto">
								<input type="text" name="from1" value="{{ old('from1', @$variable->from1) }}" id="from2" class="form-control form-control-sm @error('from1') is-invalid @enderror" placeholder="From">
								@error('from1')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row m-1 @error('to1') has-error @enderror">
							<label for="to2" class="col-form-label col-sm-2">To : </label>
							<div class="col-sm-6 my-auto">
								<input type="text" name="to1" value="{{ old('to1', @$variable->to1) }}" id="to2" class="form-control form-control-sm @error('to1') is-invalid @enderror" placeholder="To">
								@error('to1')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row m-1 @error('user1.*') has-error @enderror">
							<label for="seller1" class="col-form-label col-sm-2">Merchandiser : </label>
							<div class="col-sm-6 my-auto">
								<select name="user1[]" id="seller1" class="form-select form-select-sm col-sm-12 @error('user1[]') is-invalid @enderror" multiple></select>
								@error('user1.*')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="card-footer d-flex justify-content-end">
						<button type="submit" class="btn btn-sm btn-outline-primary me-1"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
						<a href="{{-- route('banks.index') --}}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
					</div>
				</div>
			</form>

			<form method="POST" action="{{ route('printreport.payment') }}" accept-charset="UTF-8" id="incomesales" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
				@csrf
				<div class="card">
					<div class="card-header">Income Report</div>
					<div class="card-body">

						<div class="form-group row m-1 @error('from2') has-error @enderror">
							<label for="from3" class="col-form-label col-sm-2">From : </label>
							<div class="col-sm-6 my-auto">
								<input type="text" name="from2" value="{{ old('from2', @$variable->from2) }}" id="from3" class="form-control form-control-sm @error('from2') is-invalid @enderror" placeholder="From">
								@error('from2')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row m-1 @error('to2') has-error @enderror">
							<label for="to3" class="col-form-label col-sm-2">To : </label>
							<div class="col-sm-6 my-auto">
								<input type="text" name="to2" value="{{ old('to2', @$variable->to2) }}" id="to3" class="form-control form-control-sm @error('to2') is-invalid @enderror" placeholder="To">
								@error('to2')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row m-1 @error('user2.*') has-error @enderror">
							<label for="seller2" class="col-form-label col-sm-2">Merchandiser : </label>
							<div class="col-sm-6 my-auto">
								<select name="user2[]" id="seller2" class="form-select form-select-sm col-sm-12 @error('user2') is-invalid @enderror" multiple></select>
								@error('user2.*')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

					</div>
					<div class="card-footer d-flex justify-content-end">
						<button type="submit" class="btn btn-sm btn-outline-primary me-1"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
						<a href="{{-- route('banks.index') --}}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
					</div>
				</div>
			</form>




		</div>
	</div>
</div>

@endsection


@section('jquery')

////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(`#seller,#seller1,#seller2`).select2({
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
				idIn: [],
				id: `{{ old('id_user', @$sales->id_user) }}`,
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
@if(old('user', @$sales->id_user))
$.ajax({
	url: `{{ route('getUser') }}`,
	data: {
		id: `{{ old('user', @$sales->id_user) }}`
	},
	dataType: 'json'
}).then(data => {
	if (!Array.isArray(data)) return;

	data.forEach(group => {
		if (!Array.isArray(group.users)) return;

		group.users.forEach(user => {
			const option = new Option(user.name, user.id, true, true);
			$('#seller,#seller1,#seller2').append(option);
		});
	});

	$('#seller,#seller1,#seller2').trigger('change'); // trigger once
});
@endif

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
$('#from1').datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,   // month dropdown
	changeYear: true,    // year dropdown
	showButtonPanel: true
}).on('change', function () {
	$('#salesform').bootstrapValidator('revalidateField', 'from');
	var minDate = $(this).datepicker('getDate');
	$('#to1').datepicker('option', 'minDate', minDate);
});

$('#to1').datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,   // month dropdown
	changeYear: true,    // year dropdown
	showButtonPanel: true
})
.on('changeDate show', function(e) {
	$('#salesform').bootstrapValidator('revalidateField', 'to');
	var maxDate = $(this).datepicker('getDate');
	$('#from1').datepicker('option', 'maxDate', maxDate);
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#salesform').bootstrapValidator({
	fields: {
		from: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
$('#from2').datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,   // month dropdown
	changeYear: true,    // year dropdown
	showButtonPanel: true
})
.on('changeDate show', function(e) {
	$('#auditsales').bootstrapValidator('revalidateField', 'from1');
	var minDate = $(this).datepicker('getDate');
	$('#to2').datepicker('option', 'minDate', minDate);
});

$('#to2').datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,   // month dropdown
	changeYear: true,    // year dropdown
	showButtonPanel: true
})
.on('changeDate show', function(e) {
	$('#auditsales').bootstrapValidator('revalidateField', 'to1');
	var maxDate = $(this).datepicker('getDate');
	$('#from2').datepicker('option', 'maxDate', maxDate);
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#auditsales').bootstrapValidator({
	fields: {
		from1: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to1: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user1[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
$('#from3').datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,   // month dropdown
	changeYear: true,    // year dropdown
	showButtonPanel: true
})
.on('changeDate show', function(e) {
	$('#incomesales').bootstrapValidator('revalidateField', 'from2');
	var minDate = $(this).datepicker('getDate');
	$('#to3').datepicker('option', 'minDate', minDate);
});

$('#to3').datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,   // month dropdown
	changeYear: true,    // year dropdown
	showButtonPanel: true
})
.on('changeDate show', function(e) {
	$('#incomesales').bootstrapValidator('revalidateField', 'to2');
	var maxDate = $(this).datepicker('getDate');
	$('#from3').datepicker('option', 'maxDate', maxDate);
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#incomesales').bootstrapValidator({
	fields: {
		from2: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to2: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user2[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});


@endsection
