@extends('nav')

@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});

	$("#pro").chained("#cate");

	$('#pro').change(function() {
		var myValue = $(this).val();
		switch (myValue) {

				case '':
				$('input[name="retail"]').val('');
				$('input[name="commission"]').val('');
				break;
			<?php foreach ($pro as $ky): ?>
				case '{!! $ky->id !!}':
				$('input[name="retail"]').val('{!! $ky->retail !!}');
				$('input[name="commission"]').val('{!! $ky->commission !!}');
				break;
			<?php endforeach ?>


		}
	});

	$('#date').datepicker({
		autoclose:true,
		format:'yyyy-mm'
	});
@endsection


@section('content')

<div class="col-lg-8 col-lg-offset-2">
	<div class="row">
	<p>
		<a href="{!! route('transactions.create') !!}" class="btn btn-info">Back to transactions</a>
	</p>
	</div>


	@include('partial.errorform')
	@include('partial.info')

	{!! Form::model($transactions, [
						'route' => [
										'transactions.update',
										$transactions->id
									],
						'method' => 'PATCH',
						'class' => 'form-horizontal'
					]) !!}

<?php
foreach ($cate as $key) {
	$r[$key->id] = $key->category;
}
?>
<div class="panel panel-default">
<div class="panel-heading">Edit item komisen</div>
	<div class="panel-body">
	<div class="form-group {!! ( count($errors->get('commission_on')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('date', 'Commission On :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'commission_on', $trans->commission_on, ['class' => 'form-control', 'placeholder' => 'Month', 'id' => 'date']) !!}
			</div>
		</div>
		
		<!-- for searching product, based on categories of product -->
		<div class="form-group {!! ( count($errors->get('id_category')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('cate', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('id_category', $r, $procate->category->id , ['class' => 'form-control', 'placeholder' => 'Choose Category', 'id' => 'cate']) !!}
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('id_product')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pro', 'Product :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
			<select name="id_product" class="form-control" id="pro">
					<option value=""  class="" selected>Choose Product</option>
				@foreach($pro as $kl)
					<option value="{!! $kl->id !!}" class="{!! $kl->id_category !!}" {!! ($trans->id_product == $kl->id) ? 'selected' : '' !!}>{!! $kl->product !!}</option>
				@endforeach
			</select>
		
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('retail')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('ret', 'Retail (RM) :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'retail', number_format($trans->retail, 2), ['class' => 'form-control', 'placeholder' => 'Retail (RM)', 'id' => 'ret']) !!}
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('commission')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('comm', 'Commission (RM) :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'commission', number_format($trans->commission, 2), ['class' => 'form-control', 'placeholder' => 'Commission (RM)', 'id' => 'comm']) !!}
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('quantity')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('quan', 'Quantity :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'quantity', $trans->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity', 'id' => 'quan']) !!}
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
			{!! Form::close() !!}
</div>
</div>
</div>
@endsection