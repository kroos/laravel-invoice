@extends('layouts.app')

@section('content')
<div class="col-sm-12 row align-items-center justify-content-center">
	<h3>Profile</h3>


	<div class="card my-3">
		<div class="card-header">
			<h3 class="card-title">Update Profile Information</h3>
		</div>

		<div class="card-body">
			<div class="col-sm-12">@include('profile.partials.update-profile-information-form')</div>
		</div>
		<div class="card-body">
			<div class="col-sm-12">@include('profile.partials.update-password-form')</div>
		</div>
		<div class="card-body">
			<div class="col-sm-12">@include('profile.partials.delete-user-form')</div>
		</div>
		<div class="card-footer text-muted">
		</div>
	</div>


</div>
@endsection

@section('js')
@endsection
