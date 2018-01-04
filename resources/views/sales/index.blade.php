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
						<th>editing</th>
						<th>invoice number</th>
						<th>date</th>
						<th>no tracking</th>
						<th>total commission</th>
						<th>total invoice</th>
						<th>total payment</th>
						<th>status</th>
					</thead>
					<tbody>
						<?php
						if (auth()->user()->id_group == 1) {
							$inv = App\Sales::where(['deleted_at' => NULL])->get();
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
							<td>
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										<li role="separator" class="divider"></li>
										<li><a href="{!! route('sales.edit', $in->id) !!}" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; edit</a></li>
										<li><a href="{!! route('sales.destroy', $in->id) !!}" ><i class="fa fa-trash fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; delete</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="{!! route('printpdf.print', $in->id) !!}" target="_blank"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; export to pdf</a></li>
										<li><a href="{!! route('emailpdf.send', $in->id) !!}"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; sent email</a></li>
										<li role="separator" class="divider"></li>
									</ul>
								</div>
							</td>
							<td>{!! $in->id !!}</td>
							<td>{!! my($in->date_sale) !!}</td>
							<!-- <td>{!! $in->no_tracking !!}</td> -->
							<td>
								<?php
									$slip = App\SlipNumbers::where(['id_sales' => $in->id])->get();
									foreach ( $slip as $imu ) {
										echo $imu->tracking_number.'<br />';
									}
								?>
							</td>
							<td>RM {!! number_format($tcomm,2) !!}</td>
							<td>RM {!! number_format($tamo, 2) !!}</td>
							<td>RM {!! number_format($paya, 2) !!}</td>
							<td><p class="btn <?php echo ($re < 0)? 'btn-danger' : 'btn-success' ?>"><?php echo ($re < 0) ? '<i class="fa fa-credit-card fa-lg" aria-hidden="true"></i>' : '<i class="fa fa-money fa-lg" aria-hidden="true"></i>' ?></p></td>
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