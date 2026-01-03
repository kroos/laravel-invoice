@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('banks.update', $bank) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card">
		<div class="card-header">
			Banks and Financial Institutions
		</div>
		<div class="card-body">
			@include('banks._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1">
				<i class="fa-regular fa-floppy-disk"></i> Submit
			</button>
			<a href="{{ route('banks.index') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>
@endsection


@section('js')
@endsection
