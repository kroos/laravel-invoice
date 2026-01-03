@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('taxes.update', $tax->slug) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card">
		<div class="card-header">Taxes</div>
		<div class="card-body">
			<p>Please take note that the tax amount is in the percentage.</p>
			@include('taxes._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1 my-auto"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
			<a href="{{ route('taxes.index') }}" class="btn btn-sm btn-outline-secondary me-1 my-auto">Cancel</a>
		</div>
	</div>
</form>
@endsection


@section('js')
@endsection
