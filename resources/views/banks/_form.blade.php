<div class="form-group row m-1 @error('bank') has-error @enderror">
	<label for="bank" class="col-form-label col-sm-2">Bank : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="bank" value="{{ old('bank', @$bank->bank) }}" id="bank" class="form-control form-control-sm @error('bank') is-invalid @enderror" placeholder="Bank">
		@error('bank')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('bank') has-error @enderror">
	<label for="bank" class="col-form-label col-sm-2">Bank : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="bank" value="{{ old('bank', @$bank->bank) }}" id="bank" class="form-control form-control-sm @error('bank') is-invalid @enderror" placeholder="Bank">
		@error('bank')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('city') has-error @enderror">
	<label for="city" class="col-form-label col-sm-2">City : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="city" value="{{ old('city', @$bank->city) }}" id="city" class="form-control form-control-sm @error('city') is-invalid @enderror" placeholder="City">
		@error('city')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('swift_code') has-error @enderror">
	<label for="sc" class="col-form-label col-sm-2">Swift Code : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="swift_code" value="{{ old('swift_code', @$bank->swift_code) }}" id="sc" class="form-control form-control-sm @error('swift_code') is-invalid @enderror" placeholder="Swift Code">
		@error('swift_code')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('account') has-error @enderror">
	<label for="acc" class="col-form-label col-sm-2">Account : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="account" value="{{ old('account', @$bank->account) }}" id="acc" class="form-control form-control-sm @error('account') is-invalid @enderror" placeholder="Account">
		@error('account')
		<div class="invalid-feedback">
			{{ $message }}
		</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('active') has-error @enderror">
	<div class="col-sm-6 offset-sm-2 my-auto">
		<label for="act" class="form-check-label @error('active') is-invalid @enderror">
			<input type="checkbox" name="active" value="true" id="act" class="form-check-input @error('active') is-invalid @enderror" role="switch" {{ ( old('active', @$bank->active) == true )?'checked':NULL }}>&nbsp;Active
		</label>
		@error('active')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>
