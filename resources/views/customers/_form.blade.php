<div class="form-group row m-1 @error('client') has-error @enderror">
	<label for="cli" class="col-form-label col-sm-2">Customer : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="client" value="{{ old('client', @$customers->client) }}" id="cli" class="form-control form-control-sm @error('client') is-invalid @enderror" placeholder="Customer">
		@error('client')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('client_address') has-error @enderror">
	<label for="cliadd" class="col-form-label col-sm-2">Address : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="client_address" value="{{ old('client_address', @$customers->client_address) }}" id="cliadd" class="form-control form-control-sm @error('client_address') is-invalid @enderror" placeholder="Address">
		@error('client_address')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('client_poskod') has-error @enderror">
	<label for="clipost" class="col-form-label col-sm-2">Postcode : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="client_poskod" value="{{ old('client_poskod', @$customers->client_poskod) }}" id="clipost" class="form-control form-control-sm @error('client_poskod') is-invalid @enderror" placeholder="Postcode">
		@error('client_poskod')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('client_phone') has-error @enderror">
	<label for="coephone" class="col-form-label col-sm-2">Phone : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="client_phone" value="{{ old('client_phone', @$customers->client_phone) }}" id="coephone" class="form-control form-control-sm @error('client_phone') is-invalid @enderror" placeholder="Phone">
		@error('client_phone')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('client_email') has-error @enderror">
	<label for="clieemail" class="col-form-label col-sm-2">Email : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="client_email" value="{{ old('client_email', @$customers->client_email) }}" id="clieemail" class="form-control form-control-sm @error('client_email') is-invalid @enderror" placeholder="Email">
		@error('client_email')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>
