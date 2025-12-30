@extends('layout.master')

@section('content')
<?php $rt = App\Product::find($productImage->id_product) ?>
<form method="POST" action="{{ route('productimage.update', $productImage) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card">
		<div class="card-header">
			Edit Image for <strong>{!! $rt->product !!}</strong>
		</div>
		<div class="card-body">

			<div class="form-group row m-1 @error('image') has-error @enderror">
				<label for="img" class="col-form-label col-sm-2">Image : </label>
				<div class="col-sm-6 my-auto">
					<input type="file" name="image" value="{{ old('image', @$productImage->image) }}" id="img" class="form-control form-control-sm @error('image') is-invalid @enderror" placeholder="Image">
					@error('image')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</div>

		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
			<a href="{{ route('product.edit', $rt->slug) }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>
@endsection

@section('jquery')
/////////////////////////////////////////////////////////////////////////////////////////
	$("input").keyup(function() {
		tch(this);
	});

/////////////////////////////////////////////////////////////////////////////////////////



@endsection
