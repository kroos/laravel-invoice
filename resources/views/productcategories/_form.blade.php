<div class="form-group row m-1 @error('category') has-error @enderror">
	<label for="cate" class="col-form-label col-sm-2">Category : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="category" value="{{ old('category', @$productcategory->product_category) }}" id="cate" class="form-control form-control-sm @error('category') is-invalid @enderror" placeholder="Category">
		@error('category')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('active') has-error @enderror">
	<div class="col-sm-6 offset-sm-2 my-auto">
		<label for="act" class="form-check-label @error('active') is-invalid @enderror">
			<input type="checkbox" name="active" value="1" id="act" class="form-check-input @error('active') is-invalid @enderror" role="switch" {{ ( old('active', @$productcategory->active) == 1 )?'checked':NULL }}>&nbsp;Active
		</label>
		@error('active')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>
