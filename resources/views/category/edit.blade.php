@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('category.update', $productCategory) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card">
		<div class="card-header">Edit Product Category</div>
		<div class="card-body">
			@include('category._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1">
				<i class="fa-regular fa-floppy-disk"></i> Submit
			</button>
			<a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>

	</div>
</form>

@endsection


@section('jquery')
	$("input").keyup(function() {
		tch(this);
	});
@endsection
