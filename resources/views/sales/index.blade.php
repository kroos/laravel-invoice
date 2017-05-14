@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')
<?php
use Carbon\Carbon;

function my($string) {
	$rt = Carbon::createFromFormat('Y-m-d', $string);
	return date('d F Y', mktime(0, 0, 0, $rt->month, $rt->day, $rt->year));
}
?>
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Invoice</div>
		<div class="panel-body">
		<p class="text-right"><a href="{!! route('sales.create') !!}" class="btn btn-info">New Invoice</a></p>
			<div class="col-lg-12 table-responsive">

				<table id="example" class="table table-hover">
					<thead>
						@if(auth()->user()->id_group == 1)
						<th>officer</th>
						@endif
						<th>id invoice</th>
						<th>date</th>
						<th>no tracking</th>
						<th>total commission</th>
						<th>total invoice</th>
						<th>total payment</th>
						<th>status</th>
						<th>delete</th>
					</thead>
					<tbody>
						<?php
						if (auth()->user()->id_group == 1) {
							$inv = App\Sales::withTrashed()->where(['deleted_at' => NULL])->get();
						} else {
							$inv = App\Sales::where(['deleted_at' => NULL, 'id_user' => auth()->user()->id])->get();
						}
						
						?>
						@foreach($inv as $in)
<?php
///////////////////////////////////////////////////////////////////////////////////////////////
$ttax = App\SalesTax::where(['id_sales' => $in->id, 'deleted_at' => NULL])->get();
$tcharge = 0;
foreach ($ttax as $k) {
	$tcharge += App\Taxes::findOrFail($k->id_tax)->amount;
}

///////////////////////////////////////////////////////////////////////////////////////////////
$tinv = App\SalesItems::where(['id_sales' => $in->id, 'deleted_at' => NULL])->get();
$tamo = 0;
foreach ($tinv as $tin) {
	// echo $tin->retail.'&nbsp;'.$tin->quantity.'<br />';
	$tamo += $tin->retail * $tin->quantity;
	// echo $tamo.' total amount<br />';
}
//total amount
$tamo = $tamo + ( $tamo * ($tcharge / 100) );


$tcomm = 0;
foreach ($tinv as $tinc) {
	// echo $tinc->commission.'&nbsp;'.$tinc->quantity.'<br />';
	$tcomm += $tinc->commission * $tinc->quantity;
	// echo $tcomm.' total amount<br />';
}
///////////////////////////////////////////////////////////////////////////////////////////////

$pay = App\Payments::where(['id_sales' => $in->id, 'deleted_at' => NULL])->get();
$paya = 0;
foreach ($pay as $py) {
	$paya += $py->amount;
}
$re = $paya - $tamo;
?>
						<tr class="<?=($re < 0)? 'danger' : '' ?>">
							@if(auth()->user()->id_group == 1)
							<td>{!! App\User::find($in->id_user)->name !!}</td>
							@endif
							<td><a href="{!! route('sales.edit', $in->id) !!}" class="btn btn-info">edit {!! $in->id !!}</a></td>
							<td>{!! my($in->date_sale) !!}</td>
							<td>{!! $in->no_tracking !!}</td>
<!-- 							<td>
								<?php
									$slip = App\SlipPostage::where(['id_sales' => $in->id])->get();
									foreach ( $slip as $imu ) {
										echo '<img src="data:'.$imu->mime.';base64, '.$imu->image.'" class="img-responsive img-rounded">';
									}
								?>
							</td> -->
							<td>RM {!! $tcomm !!}</td>
							<td>RM {!! $tamo !!}</td>
							<td>RM {!! $paya !!}</td>
							<td><p class="btn <?php echo ($re < 0)? 'btn-danger' : 'btn-success' ?>"><?php echo ($re < 0)? 'Pending' : 'Paid' ?></p></td>
							<td><a href="{!! route('sales.destroy', $in->id) !!}" class="btn btn-danger" >delete {!! $in->id !!}</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

@endsection


@section('jquery')

@endsection