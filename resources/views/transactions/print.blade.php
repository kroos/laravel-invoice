@extends('nav')

@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
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

	{!! Form::open(['route' => 'transactions.printstore', 'class' => 'form-horizontal']) !!}

@if(auth()->user()->id_group == 1)

<?php
// dd($t);
$t = \App\Users::all();
foreach($t as $g) {
	$h[$g->id] = $g->name;
}
?>

		<div class="form-group {!! ( count($errors->get('id_user')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('us', 'User :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('id_user', $h, NULL, ['class' => 'form-control', 'placeholder' => 'Choose User', 'id' => 'us']) !!}
			</div>
		</div>
@else
	{!! Form::hidden('id_user', auth()->user()->id) !!}
@endif

		<div class="form-group {!! ( count($errors->get('commission_on')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('date', 'Commission On :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'commission_on', @$value, ['class' => 'form-control', 'placeholder' => 'Month', 'id' => 'date']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>



<div class="row ">
	<div class="col-lg-10 table-responsive col-centered">

<?php
// dt-responsive nowrap
$iret = 0;
$icomm = 0;
?>

	@if( count($search) > 0 )
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
			</thead>
			<tbody>
				@foreach ($search as $k)
					<tr>
						<td>{!! $k->id !!}</td>
						<td>{!! App\Product::findOrFail($k->id_product)->product !!}</td>
						<td>{!! $k->commission_on !!}</td>
						<td>{!! number_format($k->retail, 2) !!}</td>
						<td>{!! number_format($k->commission, 2) !!}</td>
						<td>{!! $k->quantity !!}</td>
						<td>{!! number_format($k->quantity*$k->retail, 2) !!}<?php $iret = $iret + ($k->quantity*$k->retail) ?></td>
						<td>{!! number_format($k->quantity*$k->commission, 2) !!}<?php $icomm = $icomm + $k->quantity*$k->commission ?></td>
						<td>
							<?php
									$imge = App\Product::findOrFail($k->id_product)->productimage;
									foreach ($imge as $imu ) {
										echo '<img src="data:'.$imu->mime.';base64, '.$imu->image.'" class="img-responsive img-rounded">';
									}
							?>
						</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<th>id</th>
				<th>product</th>
				<th>month</th>
				<th>retail (RM)</th>
				<th>commission (RM)</th>
				<th>quantity</th>
				<th>RM {!! number_format($iret, 2) !!}</th>
				<th>RM {!! number_format($icomm, 2) !!}</th>
				<th>image</th>
			</tfoot>
		</table>
	@else

	@endif
	</div>
</div>
@endsection