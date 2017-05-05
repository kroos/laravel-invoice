@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Banks and Financial Institutions</div>
		<div class="panel-body">
			<div class="col-lg-12">

			{!! Form::model($banks, ['route' => ['banks.update', $banks->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

				<div class="form-group {!! ( count($errors->get('bank')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('commission', 'Bank :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'bank', $banks->bank, ['class' => 'form-control', 'placeholder' => 'Bank', 'id' => 'commission']) !!}
					</div>
				</div>

				<div class="form-group {!! ( count($errors->get('city')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('city', 'City :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'city', $banks->city, ['class' => 'form-control', 'placeholder' => 'City', 'id' => 'city']) !!}
					</div>
				</div>

				<div class="form-group {!! ( count($errors->get('swift_code')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('swift_code', 'Swift Code :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'swift_code', $banks->swift_code, ['class' => 'form-control', 'placeholder' => 'Swift Code', 'id' => 'swift_code']) !!}
					</div>
				</div>

				<div class="form-group {!! ( count($errors->get('account')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('account', 'Account Number :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'account', $banks->account, ['class' => 'form-control', 'placeholder' => 'No. Account', 'id' => 'account']) !!}
					</div>
				</div>

				<div class="form-group col-lg-12">
					<div class="col-sm-offset-2 col-sm-10">
						<p>{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}</p>
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

	$(document).on('keyup', 'input', function () {
		toUppercase(this);
	});

	function toUppercase(obj) {
		var mystring = obj.value;
		var sp = mystring.split(' ');
		var wl=0;
		var f ,r;
		var word = new Array();
		for (i = 0 ; i < sp.length ; i ++ ) {
			f = sp[i].substring(0,1).toUpperCase();
			r = sp[i].substring(1).toUpperCase();
			word[i] = f+r;
		}
		newstring = word.join(' ');
		obj.value = newstring;
		return true;
	}
@endsection