@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('taxes.store') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	<div class="card">
		<div class="card-heading">Add Tax</div>
		<div class="card-body">
			@include('taxes._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1">
				<i class="fa fa-save"></i> Submit
			</button>
			<a href="{{ route('taxes.index') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>
@endsection


@section('jquery')
@endsection
