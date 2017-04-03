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

	@include('partial.errorform')
	@include('partial.info')

	{!! Form::open(['route' => 'transactions.store', 'class' => 'form-horizontal']) !!}
	{!! Form::hidden('id_user', auth()->user()->id) !!}

<?php
foreach ($cate as $key) {
	$r[$key->id] = $key->category;
}
?>

<div class="panel panel-default">
<div class="panel-heading">Tambah produk untuk komisen</div>
	<div class="panel-body">
		<div class="form-group {!! ( count($errors->get('commission_on')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('date', 'Commission On :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'commission_on', @$value, ['class' => 'form-control', 'placeholder' => 'Month', 'id' => 'date']) !!}
			</div>
		</div>
		
		<!-- for searching product, based on categories of product -->
		<div class="form-group {!! ( count($errors->get('id_category')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('cate', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('id_category', $r, NULL, ['class' => 'form-control', 'placeholder' => 'Choose Category', 'id' => 'cate']) !!}
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('id_product')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pro', 'Product :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
			<select name="id_product" class="form-control" id="pro">
					<option value=""  class="" selected>Choose Product</option>
				@foreach($pro as $kl)
					<option value="{!! $kl->id !!}" class="{!! $kl->id_category !!}">{!! $kl->product !!}</option>
				@endforeach
			</select>
		
			</div>
		</div>
		
		<div class="form-group {!! ( count($errors->get('retail')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('ret', 'Retail (RM) :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'retail', @$value, ['class' => 'form-control', 'placeholder' => 'Retail (RM)', 'id' => 'ret']) !!}
			</div>
		</div>
		
		@if(auth()->user()->id_group == 1)
		
		<div class="form-group {!! ( count($errors->get('commission')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('comm', 'Commission (RM) :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'commission', @$value, ['class' => 'form-control', 'placeholder' => 'Commission (RM)', 'id' => 'comm']) !!}
			</div>
		</div>
		
		@else
		
		<!-- <div class="form-group {!! ( count($errors->get('commission')) ) >0 ? 'has-error' : '' !!}"> -->
			<!-- <div class="col-sm-10"> -->
				{!! Form::input('hidden', 'commission', @$value, ['class' => 'form-control', 'placeholder' => 'Commission (RM)', 'id' => 'comm']) !!}
			<!-- </div> -->
		<!-- </div> -->
		
		@endif
		
		<div class="form-group {!! ( count($errors->get('quantity')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('quan', 'Quantity :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'quantity', @$value, ['class' => 'form-control', 'placeholder' => 'Quantity', 'id' => 'quan']) !!}
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


<div class="row ">
	<div class="col-lg-10 table-responsive col-centered">

<?php
// dt-responsive nowrap
?>

	@if( count($trans) > 0 )
		<table id="example" class="table table-border table-hover ">
			<thead>
				<th>id</th>
				<th>product</th>
				<th>month</th>
				<th>retail (RM)</th>
				<th>commission (RM)</th>
				<th>quantity</th>
				<th>total retail (RM)</th>
				<th>total commission (RM)</th>
				<th>image</th>
				<th>padam</th>
			</thead>
			<tfoot>
				<th>id</th>
				<th>product</th>
				<th>month</th>
				<th>retail (RM)</th>
				<th>commission (RM)</th>
				<th>quantity</th>
				<th>total retail (RM)</th>
				<th>total commission (RM)</th>
				<th>image</th>
				<th>padam</th>
			</tfoot>
			<tbody>
				@foreach ($trans as $k)
					<tr>
						<td><a href="{!! route('transactions.edit', $k->id) !!}" class="btn btn-info">edit {!! $k->id !!}</a></td>
						<td>{!! App\Product::findOrFail($k->id_product)->product !!}</td>
						<td>{!! $k->commission_on !!}</td>
						<td>{!! number_format($k->retail, 2) !!}</td>
						<td>{!! number_format($k->commission, 2) !!}</td>
						<td>{!! $k->quantity !!}</td>
						<td>{!! number_format($k->quantity*$k->retail, 2) !!}</td>
						<td>{!! number_format($k->quantity*$k->commission, 2) !!}</td>
						<td>
							<?php
									$imge = App\Product::findOrFail($k->id_product)->productimage;
									foreach ($imge as $imu ) {
										echo '<img src="data:'.$imu->mime.';base64, '.$imu->image.'" class="img-responsive img-rounded">';
									}
							?>
						</td>
						<td>
							<a href="{!! route('transactions.destroy', $k->id) !!}" class="btn btn-danger remove">padam {!! $k->id !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
	@endif
	</div>
</div>
@endsection