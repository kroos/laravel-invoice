/////////////////////////////////////////////////////////////////////////////////////////
// select2
$(`#cat`).select2({
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
				// idIn: ids??[],
			}
		},
		processResults: function (data) {
			return {
				results: data.map(function (category) {
					return {
						id: category.id,
						text: category.product_category,

					}
				})
			};
		}

	},
});
@if(old('id_category', @$product->id_category))
$.ajax({
	url: `{{ route('getProducts') }}`,
	data: {
		id: `{{ old('id_category', @$product->id_category) }}`
	},
	dataType: 'json'
}).then(data => {
		const option = new Option(data[0].product_category, data[0].id, true, true);
		$('#cat').append(option).trigger('change');
		// $('#us').trigger('change'); // trigger once
});
@endif

/////////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$("#form").bootstrapValidator({
	fields: {
		product: {
			validators: {
				notEmpty: {
					message: 'Please insert product name. '
				},
			}
		},
		retail: {
			validators: {
				notEmpty: {
					message: 'Please insert retail price. '
				},
				greaterThan: {
					value: 0,
					message: 'The retail price should be greater than 0. '
				}
			}
		},
@if(auth()->user()->id_group == 1)
		commission: {
			validators: {
				notEmpty: {
					message: 'Please insert commission. '
				},
				greaterThan: {
					value: 0,
					message: 'The commssion should be greater than 0. '
				}
			}
		},
@endif
		'image[]': {
			validators: {
				notEmpty: {
					message: 'Please select an image'
				},
				file: {
					extension: 'jpeg,jpg,png,bmp',
					type: 'image/jpeg,image/png,image/bmp',
					maxSize: 7990272,   // 3264 * 2448
					message: 'The selected file is not valid. It should be 3264X2448 max dimension. '
				}
			}
		},
		id_category: {
			validators: {
				notEmpty: {
					message: 'Please choose an category for the product. '
				}
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////
