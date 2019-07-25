@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Preference Option</div>
		<div class="panel-body">
			<div class="col-lg-12">

			{!! Form::model($preferences, ['route' => ['preferences.update', $preferences->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true]) !!}

				<div class="row">
					<div class="col-lg-12">

	<div class="form-group {!! ( count($errors->get('company_name')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('commission', 'Company Name :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::input('text', 'company_name', @$value, ['class' => 'form-control', 'placeholder' => 'Company Name', 'id' => 'commission']) !!}
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('company_registration')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('compregnum', 'Company Registration Number :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::input('text', 'company_registration', @$value, ['class' => 'form-control', 'placeholder' => 'Company Registration Number', 'id' => 'compregnum']) !!}
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('logo.*')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('img', 'Company Logo :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::file('logo[]', ['id' => 'img']) !!}
		</div>
		<div class="col-sm-10 col-sm-offset-2">
		<img src="data:{!! $preferences->company_logo_mime !!};base64,{!! $preferences->company_logo_image !!}" width="50%" class="img-responsive img-rounded">
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('company_tagline')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('cotag', 'Company Tagline :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::input('text', 'company_tagline', @$value, ['class' => 'form-control', 'placeholder' => 'Company Tagline', 'id' => 'cotag']) !!}
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('company_address')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('coadd', 'Company Address :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::textarea('company_address', @$value, ['class' => 'form-control', 'placeholder' => 'Company Address', 'id' => 'coadd']) !!}
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('company_postcode')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('copost', 'Company Postcode :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::input('text', 'company_postcode', @$value, ['class' => 'form-control', 'placeholder' => 'Company Postcode', 'id' => 'copost']) !!}
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('company_fixed_line')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('cofixline', 'Fixed Line Phone Number :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::input('text', 'company_fixed_line', @$value, ['class' => 'form-control', 'placeholder' => 'Fixed Line Phone Number', 'id' => 'cofixline']) !!}
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('company_mobile')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('compmobilephonenum', 'Company Mobile Phone Number :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::input('text', 'company_mobile', @$value, ['class' => 'form-control', 'placeholder' => 'Company Mobile Phone Number', 'id' => 'compmobilephonenum']) !!}
		</div>
	</div>

	<div class="form-group {!! ( count($errors->get('company_email')) ) >0 ? 'has-error' : '' !!}">
		{!! Form::label('compemail', 'Company Email :', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-10">
			{!! Form::input('text', 'company_email', @$value, ['class' => 'form-control', 'placeholder' => 'Company Mobile Phone Number', 'id' => 'compemail']) !!}
		</div>
	</div>


					</div>
				</div>
					<div class="row">
						<div class="col-lg-6">
@foreach (App\User::all() as $r)
	<?php $rm[$r->id] = $r->name; ?>
@endforeach

				<div class="form-group {!! ( count($errors->get('company_owner')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('own', 'Owner :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('company_owner', $rm, @$value, ['class' => 'form-control', 'placeholder' => 'Choose Owner', 'id' => 'own']) !!}
					</div>
				</div>


							
						</div>
						<div class="col-lg-6">
				<div class="form-group {!! ( count($errors->get('company_person_in-charge')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('comppersonincharge', 'Company Person In-Charge :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('company_person_in-charge', $rm, @$value, ['class' => 'form-control', 'placeholder' => 'Choose Company Person In-Charge', 'id' => 'comppersonincharge']) !!}
					</div>
				</div>


						</div>
					</div>
				</div>


				<div class="form-group col-lg-12">
					<div class="col-sm-offset-2 col-sm-10">
						<p>{!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg btn-block']) !!}</p>
					</div>
				</div>
			{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>

@endsection


@section('jquery')
////////////////////////////////////////////////////////////////////////////////////
// uppercase input for tracking number and customer section

	$(document).on('keyup', 'input, textarea', function () {
		uch(this);
	});

$('#own, #comppersonincharge').select2({
	placeholder: 'Please choose'
});
@endsection