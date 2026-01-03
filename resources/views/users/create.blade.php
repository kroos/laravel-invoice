@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('users.store') }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	<div class="card mb-3">
	<div class="card-heading">Add User</div>
		<div class="card-body">
			@include('users._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
			<a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary me-1">Cancel</a>
		</div>
	</div>
</form>
@endsection

@section('js')
	@include('users._js')
@endsection
