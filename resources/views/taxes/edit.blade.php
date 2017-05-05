@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Taxes</div>
		<div class="panel-body">
			<div class="col-lg-12">
			<p>Please take note that the tax amount is in the percentage.</p>
			{!! Form::model($taxes, ['route' => ['taxes.update', $taxes->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

				<div class="form-group {!! ( count($errors->get('tax')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('commission', 'Tax Name :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'tax', $taxes->tax, ['class' => 'form-control', 'placeholder' => 'Tax Name', 'id' => 'commission']) !!}
					</div>
				</div>

				<div class="form-group {!! ( count($errors->get('amount')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('city', 'Amount in Percentage :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'amount', $taxes->amount, ['class' => 'form-control', 'placeholder' => 'Amount in percentage', 'id' => 'city']) !!}
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