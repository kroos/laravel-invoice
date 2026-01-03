@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('productcategories.store') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="mb-2 needs-validation" enctype="multipart/form-data">
	@csrf
	<div class="card">
		<div class="card-header">Add Product Category</div>
		<div class="card-body">
			@include('productcategories._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1">
				<i class="fa-regular fa-floppy-disk"></i> Submit
			</button>
			<a href="{{ route('productcategories.index') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>
@endsection


@section('js')
	@include('productcategories._js')
@endsection
