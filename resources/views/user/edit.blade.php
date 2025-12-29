@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('user.update', $user) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card mb-3">
		<div class="card-header d-flex justify-content-between">
			<h3 class="my-auto">Edit User</h3>
		</div>
		<div class="card-body">
			@include('user._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="my-auto btn btn-sm btn-outline-primary me-1">
				<i class="fa fa-save"></i> Submit
			</button>
			<a href="{{ route('user.index') }}" class="my-auto btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>
@endsection

@section('jquery')
	@include('user._js')
@endsection
