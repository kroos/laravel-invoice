@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Tax</div>
			<div class="panel-body">
				{!! Form::open(['route' => 'taxes.store', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
				<div class="form-group {!! ( count($errors->get('tax')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('pr', 'Tax :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'tax', @$value, ['class' => 'form-control', 'placeholder' => 'Tax', 'id' => 'pr']) !!}
					</div>
				</div>
		
				<div class="form-group {!! ( count($errors->get('amount')) ) >0 ? 'has-error' : '' !!}">
					{!! Form::label('co', 'Amount :', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::input('text', 'amount', @$value, ['class' => 'form-control', 'placeholder' => 'Amount in Percent', 'id' => 'co']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection


@section('jquery')
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