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

											{!! Form::open(['route' => 'printreport.store', 'class' => 'form-horizontal', 'id' => 'salesform', 'files' => true, 'autocomplete' => 'off']) !!}
											<div class="form-group {!! ( count($errors->get('from')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('from1', 'Start Date :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::input('text', 'from', @$value, ['class' => 'form-control date', 'placeholder' => 'Start Date', 'id' => 'from1']) !!}
												</div>
											</div>
											<div class="form-group {!! ( count($errors->get('to')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('to1', 'End Date :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::input('text', 'to', @$value, ['class' => 'form-control date', 'placeholder' => 'End Date', 'id' => 'to1']) !!}
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

											{!! Form::open(['route' => 'printreport.audit', 'class' => 'form-horizontal', 'files' => true, 'autocomplete' => 'off', 'id' => 'auditsales']) !!}
											<div class="form-group {!! ( count($errors->get('from1')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('from2', 'Start Date :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::input('text', 'from1', @$value, ['class' => 'form-control date', 'placeholder' => 'Start Date', 'id' => 'from2']) !!}
												</div>
											</div>
											<div class="form-group {!! ( count($errors->get('to1')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('to2', 'End Date :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::input('text', 'to1', @$value, ['class' => 'form-control date', 'placeholder' => 'End Date', 'id' => 'to2']) !!}
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
												{!! Form::label('seller1', 'Merchandiser :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::select('user1[]', $user, @$value, ['class' => 'form-control', 'id' => 'seller1', 'multiple' => 'multiple']) !!}
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
										<div class="panel-body">

											{!! Form::open(['route' => 'printreport.payment', 'class' => 'form-horizontal', 'files' => true, 'autocomplete' => 'off', 'id' => 'incomesales']) !!}
											<div class="form-group {!! ( count($errors->get('from2')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('from3', 'Start Date :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::input('text', 'from2', @$value, ['class' => 'form-control date', 'placeholder' => 'Start Date', 'id' => 'from3']) !!}
												</div>
											</div>
											<div class="form-group {!! ( count($errors->get('to2')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('to3', 'End Date :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::input('text', 'to2', @$value, ['class' => 'form-control date', 'placeholder' => 'End Date', 'id' => 'to3']) !!}
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
											<div class="form-group {!! ( count($errors->get('user2')) ) >0 ? 'has-error' : '' !!}">
												{!! Form::label('seller2', 'Merchandiser :', ['class' => 'col-sm-2 control-label']) !!}
												<div class="col-sm-10">
													{!! Form::select('user2[]', $user, @$value, ['class' => 'form-control', 'id' => 'seller2', 'multiple' => 'multiple']) !!}
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('select').select2();

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
	$('#from1').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#salesform').bootstrapValidator('revalidateField', 'from');
			var minDate = $('#from1').val();
			$('#to1').datepicker('setStartDate', minDate);
	});

	$('#to1').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#salesform').bootstrapValidator('revalidateField', 'to');
			var maxDate = $('#to1').val();
			$('#from1').datepicker('setEndDate', maxDate);
	});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#salesform').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		from: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
	$('#from2').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#auditsales').bootstrapValidator('revalidateField', 'from1');
			var minDate = $('#from2').val();
			$('#to2').datepicker('setStartDate', minDate);
	});

	$('#to2').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#auditsales').bootstrapValidator('revalidateField', 'to1');
			var maxDate = $('#to2').val();
			$('#from2').datepicker('setEndDate', maxDate);
	});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#auditsales').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		from1: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to1: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user1[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
	$('#from3').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#incomesales').bootstrapValidator('revalidateField', 'from2');
			var minDate = $('#from3').val();
			$('#to3').datepicker('setStartDate', minDate);
	});

	$('#to3').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#incomesales').bootstrapValidator('revalidateField', 'to2');
			var maxDate = $('#to3').val();
			$('#from3').datepicker('setEndDate', maxDate);
	});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#incomesales').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		from2: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to2: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user2[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});


@endsection