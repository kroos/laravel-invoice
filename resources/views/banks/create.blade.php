@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

	{!! Form::open(['route' => 'banks.store', 'class' => 'form-horizontal']) !!}
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Bank</div>
			<div class="panel-body">
				<div class="col-lg-12">
					<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('cate', 'Name :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'bank', @$value, ['class' => 'form-control', 'placeholder' => 'Name', 'id' => 'cate']) !!}
						</div>
					</div>
					<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('cit', 'City :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'city', @$value, ['class' => 'form-control', 'placeholder' => 'City', 'id' => 'cit']) !!}
						</div>
					</div>
					<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('scode', 'Swift Code :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'swift_code', @$value, ['class' => 'form-control', 'placeholder' => 'Swift Code', 'id' => 'scode']) !!}
						</div>
					</div>
					<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
						{!! Form::label('acc', 'Account :', ['class' => 'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							{!! Form::input('text', 'account', @$value, ['class' => 'form-control', 'placeholder' => 'Account', 'id' => 'acc']) !!}
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									{!! Form::input('checkbox', 'active', TRUE, @$value) !!}&nbsp;Aktif
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							{!! Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
						</div>
					</div>
				</div>
				{!! Form::close() !!}

			</div>
		</div>
	</div>
</div>
@endsection


@section('jquery')
	$("input").keyup(function() {
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