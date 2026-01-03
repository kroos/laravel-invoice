<div class="form-group row m-1 @error('tax') has-error @enderror">
	<label for="pr" class="col-form-label col-sm-2">Tax : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="tax" value="{{ old('tax', @$tax->tax) }}" id="pr" class="form-control form-control-sm @error('tax') is-invalid @enderror" placeholder="Tax">
		@error('tax')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('amount') has-error @enderror">
	<label for="co" class="col-form-label col-sm-2">Amount : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="amount" value="{{ old('amount', @$tax->amount) }}" id="co" class="form-control form-control-sm @error('amount') is-invalid @enderror" placeholder="Amount">
		@error('amount')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>
