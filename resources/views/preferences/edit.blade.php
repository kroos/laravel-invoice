@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('preferences.update', $preferences) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card">
		<div class="card-header">Preference Option</div>
		<div class="card-body">

			<div class="form-group row m-1 @error('company_name') has-error @enderror">
				<label for="cn" class="col-form-label col-sm-2">Company Name : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="company_name" value="{{ old('company_name', @$preferences->company_name) }}" id="cn" class="form-control form-control-sm @error('company_name') is-invalid @enderror" placeholder="Company Name">
					@error('company_name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_registration') has-error @enderror">
				<label for="compreg" class="col-form-label col-sm-2">Company Registration No. : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="company_registration" value="{{ old('company_registration', @$preferences->company_registration) }}" id="compreg" class="form-control form-control-sm @error('company_registration') is-invalid @enderror" placeholder="Company Registration No.">
					@error('company_registration')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('logo') has-error @enderror">
				<label for="clofo" class="col-form-label col-sm-2">Company Logo : </label>
				<div class="col-sm-6 my-auto">
					<input type="file" name="logo" value="{{ old('logo', @$preferences->logo) }}" id="clofo" class="form-control form-control-sm @error('logo') is-invalid @enderror">
					@error('logo')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
				<img src="data:{!! $preferences->company_logo_mime !!};base64,{!! $preferences->company_logo_image !!}" width="50%" class="img-responsive img-rounded">
			</div>

			<div class="form-group row m-1 @error('company_tagline') has-error @enderror">
				<label for="comptag" class="col-form-label col-sm-2">Company Tagline : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="company_tagline" value="{{ old('company_tagline', @$preferences->company_tagline) }}" id="comptag" class="form-control form-control-sm @error('company_tagline') is-invalid @enderror" placeholder="Company Tagline">
					@error('company_tagline')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_address') has-error @enderror">
				<label for="add" class="col-form-label col-sm-2">Company Address : </label>
				<div class="col-sm-6 my-auto">
					<textarea name="company_address" id="add" class="form-control form-control-sm col-sm-12 @error('company_address') is-invalid @enderror" placeholder="Comapny Address">{{ old('company_address', @$preferences->company_address) }}</textarea>
					@error('company_address')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_postcode') has-error @enderror">
				<label for="post" class="col-form-label col-sm-2">Company Postcode : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="company_postcode" value="{{ old('company_postcode', @$preferences->company_postcode) }}" id="post" class="form-control form-control-sm @error('company_postcode') is-invalid @enderror" placeholder="Company Postcode">
					@error('company_postcode')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_fixed_line') has-error @enderror">
				<label for="flpn" class="col-form-label col-sm-2">Fixed Line Phone Number : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="company_fixed_line" value="{{ old('company_fixed_line', @$preferences->company_fixed_line) }}" id="flpn" class="form-control form-control-sm @error('company_fixed_line') is-invalid @enderror" placeholder="Fixed Line Phone Number">
					@error('company_fixed_line')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_mobile') has-error @enderror">
				<label for="mobile" class="col-form-label col-sm-2">Company Mobile : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="company_mobile" value="{{ old('company_mobile', @$preferences->company_mobile) }}" id="mobile" class="form-control form-control-sm @error('company_mobile') is-invalid @enderror" placeholder="Company Mobile">
					@error('company_mobile')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_email') has-error @enderror">
				<label for="email" class="col-form-label col-sm-2">Company Email : </label>
				<div class="col-sm-6 my-auto">
					<input type="text" name="company_email" value="{{ old('company_email', @$preferences->company_email) }}" id="email" class="form-control form-control-sm @error('company_email') is-invalid @enderror" placeholder="Company Email">
					@error('company_email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_owner') has-error @enderror">
				<label for="own" class="col-form-label col-sm-2">Owner : </label>
				<div class="col-sm-6 my-auto">
					<select name="company_owner" id="own" class="form-select form-select-sm col-sm-12 @error('company_owner') is-invalid @enderror"></select>
					@error('company_owner')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

			<div class="form-group row m-1 @error('company_person_in_charge') has-error @enderror">
				<label for="cpic" class="col-form-label col-sm-2">Company Person In-Charge : </label>
				<div class="col-sm-6 my-auto">
					<select name="company_person_in_charge" id="cpic" class="form-select form-select-sm col-sm-12 @error('company_person_in_charge') is-invalid @enderror"></select>
					@error('company_person_in_charge')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>


		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary mx-1">
				<i class="fa fa-save"></i> Submit
			</button>
		</div>
	</div>
</form>

@endsection


@section('jquery')
////////////////////////////////////////////////////////////////////////////////////
$(`#own`).select2({
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
				// idIn: [],
				// id: `{{ old('company_owner', @$preferences->company_owner) }}`,
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

$(`#cpic`).select2({
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
				// idIn: [],
				// id: `{{ old('company_person_in_charge', @$preferences->company_person_in_charge) }}`,
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

@if(old('company_person_in_charge', @$preferences->company_person_in_charge))
$.ajax({
    url: `{{ route('getUser') }}`,
    data: {
        _token: '{!! csrf_token() !!}',
        id: `{{ old('company_person_in_charge', @$preferences->company_person_in_charge) }}`
    },
    dataType: 'json'
}).then(data => {
    const selectedId = `{{ old('company_person_in_charge', @$preferences->company_person_in_charge) }}`;

    data.forEach(group => {
        group.users?.forEach(user => {
            if (String(user.id) === String(selectedId)) {
                const option = new Option(user.name, user.id, true, true);
                $('#cpic').append(option).trigger('change');
            }
        });
    });
});
@endif

@if(old('company_owner', @$preferences->company_owner))
$.ajax({
    url: `{{ route('getUser') }}`,
    data: {
        _token: '{!! csrf_token() !!}',
        id: `{{ old('company_owner', @$preferences->company_owner) }}`
    },
    dataType: 'json'
}).then(data => {
    const selectedId = `{{ old('company_owner', @$preferences->company_owner) }}`;

    data.forEach(group => {
        group.users?.forEach(user => {
            if (String(user.id) === String(selectedId)) {
                const option = new Option(user.name, user.id, true, true);
                $('#own').append(option).trigger('change');
            }
        });
    });
});
@endif

@endsection
