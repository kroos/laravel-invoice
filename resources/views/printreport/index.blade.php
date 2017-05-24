@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Print Report</div>
				<div class="panel-body">

<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Sales Report</div>
				<div class="panel-body">

					{!! Form::open(['route' => 'printreport.store', 'class' => 'form-horizontal', 'files' => true, 'autocomplete' => 'off']) !!}
					<div class="form-group {!! ( count($errors->get('from')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('pr', 'From :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'from', @$value, ['class' => 'form-control date', 'placeholder' => 'From', 'id' => 'pr']) !!}
						</div>
					</div>
					<div class="form-group {!! ( count($errors->get('to')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('To', 'To :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'to', @$value, ['class' => 'form-control date', 'placeholder' => 'To', 'id' => 'To']) !!}
						</div>
					</div>
					<?php
					if (auth()->user()->id_group == 1) {
						$us = App\User::all();
					} else {
						$us = App\User::where('id', auth()->user()->id)->get();
					}
					foreach($us as $usr) {
						$user[$usr->id] = $usr->name;
					}
					?>
					<div class="form-group {!! ( count($errors->get('user')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('seller', 'Merchandiser :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::select('user[]', $user, @$value, ['class' => 'form-control', 'id' => 'seller', 'multiple' => 'multiple']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							{!! Form::submit('Show', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
						</div>
					</div>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Audit</div>
				<div class="panel-body">
					
					{!! Form::open(['route' => 'printreport.audit', 'class' => 'form-horizontal', 'files' => true, 'autocomplete' => 'off']) !!}
					<div class="form-group {!! ( count($errors->get('from1')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('pr', 'From :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'from1', @$value, ['class' => 'form-control date', 'placeholder' => 'From', 'id' => 'pr']) !!}
						</div>
					</div>
					<div class="form-group {!! ( count($errors->get('to1')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('To', 'To :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'to1', @$value, ['class' => 'form-control date', 'placeholder' => 'To', 'id' => 'To']) !!}
						</div>
					</div>
					<?php
					if (auth()->user()->id_group == 1) {
						$us = App\User::all();
					} else {
						$us = App\User::where('id', auth()->user()->id)->get();
					}
					foreach($us as $usr) {
						$user[$usr->id] = $usr->name;
					}
					?>
					<div class="form-group {!! ( count($errors->get('user1')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('seller', 'Merchandiser :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::select('user1[]', $user, @$value, ['class' => 'form-control', 'id' => 'seller', 'multiple' => 'multiple']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							{!! Form::submit('Show', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
						</div>
					</div>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>




	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Income Report</div>
				<div class="panel-body"></div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">Audit</div>
				<div class="panel-body"></div>
			</div>
		</div>
	</div>




</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection


@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('select').select2();

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
//$(document).on('change', '.date', Function () {
//	$(this).datepicker({
	$('.date').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : true,
		// Startdate: '<?= 1 - (date('j', Mktime(0, 0, 0, Date('m'), 0, Date('y'))) + Date('j') ) ?>d',
		// Enddate: '<?= (date('j') == 1) ? 1 - Date('j') : 0 - Date('j') ?>d',
	});	
//});


@endsection