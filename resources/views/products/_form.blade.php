		<div class="form-group row m-1 @error('product') has-error @enderror">
			<label for="pr" class="col-form-label col-sm-2">Product : </label>
			<div class="col-sm-6 my-auto">
				<input type="text" name="product" value="{{ old('product', @$product->product) }}" id="pr" class="form-control form-control-sm @error('product') is-invalid @enderror" placeholder="Product">
				@error('product')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row m-1 @error('retail') has-error @enderror">
			<label for="co" class="col-form-label col-sm-2">Retail : </label>
			<div class="col-sm-6 my-auto">
				<input type="text" name="retail" value="{{ old('retail', @$product->retail) }}" id="co" class="form-control form-control-sm @error('retail') is-invalid @enderror" placeholder="Retail">
				@error('retail')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		@if(auth()->user()->id_group == 1)
		<div class="form-group row m-1 @error('commission') has-error @enderror">
			<label for="com" class="col-form-label col-sm-2">Commission : </label>
			<div class="col-sm-6 my-auto">
				<input type="text" name="commission" value="{{ old('commission', @$product->commission) }}" id="com" class="form-control form-control-sm @error('commission') is-invalid @enderror" placeholder="Commission">
				@error('commission')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>
		@else
		<input type="hidden" name="commission" value="0">
		@endif

		<div class="form-group row m-1 @error('id_category') has-error @enderror">
			<label for="cat" class="col-form-label col-sm-2">Category : </label>
			<div class="col-sm-6 my-auto">
				<select name="id_category" id="cat" class="form-select form-select-sm col-sm-12 @error('id_category') is-invalid @enderror"></select>
				@error('id_category')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row m-1 @error('image') has-error @enderror">
			<label for="img" class="col-form-label col-sm-2">Image : </label>
			<div class="col-sm-6 my-auto">
				<input type="file" name="image" value="{{ old('image', @$product->image) }}" id="img" class="form-control form-control-sm @error('image') is-invalid @enderror" placeholder="Image">
				@error('image')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>

		<div class="form-group row m-1 @error('active') has-error @enderror">
			<div class="col-sm-6 offset-sm-2 my-auto">
				<label for="act" class="form-check-label form-check form-switch @error('active') is-invalid @enderror">
					<input type="hidden" name="active" value="0">
					<input type="checkbox" name="active" value="1" id="act" class="form-check-input @error('active') is-invalid @enderror" role="switch" {{ (old('active', @$product->active) == 1)?'checked':NULL }}>&nbsp;Active
				</label>
				@error('active')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
		</div>


