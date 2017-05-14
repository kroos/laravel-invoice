@extends('layout.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Statistic</div>
			<div class="panel-body">

<p>&nbsp;</p>
<div class="row">
	<div class="col-sm-12">
		<label for="myChart">Officer vs Sales Invoices</label>
		<canvas id="myChart" width="100%" height="35"></canvas>
	</div>
</div>

<p>&nbsp;</p>
<div class="row">
	<div class="col-sm-12">
	<label for="myChartpayment">Officer vs Payments Invoices</label>
		<canvas id="myChartpayment" width="100%" height="35"></canvas>
	</div>
</div>

<p>&nbsp;</p>
<div class="row">
	<div class="col-sm-12">
	<label for="myChartcommission">Officer vs Commission Invoices</label>
		<canvas id="myChartcommission" width="100%" height="35"></canvas>
	</div>
</div>

<p>&nbsp;</p>
<div class="row">
	<div class="col-sm-12">
	<label for="myChartproduct">Products Sold</label>
		<canvas id="myChartproduct" width="100%" height="35"></canvas>
	</div>
</div>

			</div>
		</div>
	</div>
</div>

@endsection


@section('jquery')

<?php
if ( auth()->user()->id_group == 2 ) {
	$user = DB::table('invoice_product')
				->selectRaw('name, color')
				->whereYear('date_sale', '=', Date('Y'))
				->where(['name' => auth()->user()->name])
				->groupBy('name')
				->get();
} else {
	$user = DB::table('invoice_product')
				->selectRaw('name, color')
				->whereYear('date_sale', '=', Date('Y'))
				->groupBy('name')
				->get();
}

$month = DB::table('invoice_product')
			->select(DB::raw('
				YEAR(date_sale),
				MONTHNAME(date_sale) bulan,
				MONTH(date_sale) nomon
				'))
			->whereYear('date_sale', '=', Date('Y'))
			->groupBy('bulan')
			->orderBy('date_sale')
			->get();

$product = DB::table('invoice_product')
				->selectRaw('
								name,
								color,
								YEAR(date_sale)tahun,
								MONTHNAME(date_sale)bulan,
								product,
								quantity
							')
				->whereYear('date_sale', '=', Date('Y'))
				->get();
?>

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// bar chart
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart
	(
		ctx,
			{
				type: 'line',
				data: 
					{
						labels: [
										<?php 
											foreach ($month as $key) {
												echo '"'.$key->bulan.'",';
											}
										?>
						],
						datasets: 
							[
								@foreach($user as $us)
								{
									label: '{!! $us->name !!}',
									data: [
												@foreach($month as $mo)
													
<?php
$tinv = DB::table('invoice_product')
				->selectRaw('
						name,
						color,
						YEAR(date_sale)tahun,
						MONTHNAME(date_sale)bulan,
						SUM(GrandTotal) AS GrandTotal
					')
				->whereYear('date_sale', '=', Date('Y'))
				->where('name', '=', $us->name)
				->whereMonth('date_sale', '=', $mo->nomon)
				->first();
	echo (($tinv->GrandTotal == NULL)? 0 : $tinv->GrandTotal) .',';
?>

												@endforeach
									],
									borderColor: "{!! $us->color !!}",
									backgroundColor : "rgba(0,0,0,0.0)"
								},
								@endforeach
							]
					},
				options:
				{
					title:
					{
						display: true,
						text: 'Officer vs Sales Invoices'
					}
				}
			}
	);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


// line chart
var ctx = document.getElementById('myChartpayment').getContext('2d');
var myChartline = new Chart
	(
		ctx,
		{
			type: 'line',
			data: 
			{
				labels: [
								<?php 
									foreach ($month as $key) {
										echo '"'.$key->bulan.'",';
									}
								?>
				],
				datasets:
					[
						@foreach($user as $us)
						{
							label: '{!! $us->name !!}',
							data: [
								@foreach($month as $mo)
<?php
								$rt = DB::table('invoice_payment')
											->selectRaw('
													name,
													color,
													YEAR(date_sale) tahun,
													MONTHNAME(date_sale)bulan,
													SUM(amount) payment
												')
											->whereYear('date_sale', '=', Date('Y'))
											->where('name', '=', $us->name)
											->whereMonth('date_sale', '=', $mo->nomon)
											->first();
											echo (($rt->payment == NULL)? 0 : $rt->payment) .',';
?>
								@endforeach
							],
									borderColor: "{!! $us->color !!}",
									backgroundColor : "rgba(0,0,0,0.0)"
						},
						@endforeach
				]
			},
			options:
			{
				title:
				{
					display: true,
					text: 'Officer vs Payments Invoices'
				}
			}
		}
	);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// line chart
var ctx = document.getElementById('myChartcommission').getContext('2d');
var myChartline = new Chart
	(
		ctx,
			{
				type: 'line',
				data: 
					{
						labels: [
										<?php 
											foreach ($month as $key) {
												echo '"'.$key->bulan.'",';
											}
										?>
						],
						datasets:
							[
							@foreach($user as $us)
								{
									label: '{!! $us->name !!}',
									data: [
									@foreach($month as $mo)
<?php
$tinvc = DB::table('invoice_product')
				->selectRaw('
						name,
						color,
						YEAR(date_sale)tahun,
						MONTHNAME(date_sale)bulan,
						SUM(TotalCommission) AS TotalCommission
					')
				->whereYear('date_sale', '=', Date('Y'))
				->where('name', '=', $us->name)
				->whereMonth('date_sale', '=', $mo->nomon)
				->first();
echo (($tinvc->TotalCommission == NULL)? 0 : $tinvc->TotalCommission) .',';
?>
									@endforeach
									],
									borderColor: "{!! $us->color !!}",
									backgroundColor : "rgba(0,0,0,0.0)"
								},
							@endforeach
						]
				},
			options:
			{
				title:
				{
					display: true,
					text: 'Officer vs Commission Invoices'
				}
			}
		}
);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// line chart
<?php
								$product = DB::table('invoice_product')
												->selectRaw('
																name,
																color,
																YEAR(date_sale)tahun,
																MONTHNAME(date_sale)bulan,
																product,
																quantity,
																SUM(quantity) sum_quantity
															')
												->whereYear('date_sale', '=', Date('Y'))
												->where('product', '<>', 'Postage')
												->groupBy('product')
												->orderBy('sum_quantity')
												// ->orderBy('quantity')
												->get();
									// echo (($key->quantity == NULL)? 0 : $key->quantity) .',';
?>

var ctx = document.getElementById('myChartproduct').getContext('2d');
var myChartline = new Chart
	(
		ctx,
		{
			// type: 'horizontalBar',
			type: 'bar',
			data: 
			{
				labels: 
				[
					@foreach ($product as $key)
						'{!! $key->product !!}',
					@endforeach
				],
				datasets:
				[
						{
							label: '',
							data:
							[
								@foreach($product as $mo)
<?php
								echo (($mo->sum_quantity == NULL)? 0 : $mo->sum_quantity) .',';
								// echo (($mo->quantity == NULL)? 0 : $mo->quantity) .',';
?>
								@endforeach
							],
									borderColor: "rgba(255, 255, 255, 1)",
									backgroundColor : "rgba(255, 159, 64, 0.6)",
									borderWidth:2
						},
				]
			},
			options:
			{
				title:
				{
					display: true,
					text: 'Products Sold'
				}
			}
		}
	);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// line chart
// var ctx = document.getElementById('Chartline').getContext('2d');
// var myChartline = new Chart
// 	(
// 		ctx,
// 		{
// 			type: 'line',
// 			data: 
// 			{
// 				labels: ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'],
// 				datasets:
// 				[
// 					{
// 						label: 'apples',
// 						data: [21, 35, 90, 9, 6, 0, 15],
//						borderColor: "rgba(54, 162, 235, 0.2)",
//						backgroundColor : "rgba(0,0,0,0.0)"
// 					},
// 					{
// 						label: 'oranges',
// 						data: [2, 29, 5, 5, 2, 3, 10],
//						borderColor: 'rgba(255, 159, 64, 0.2)',
//						backgroundColor : "rgba(0,0,0,0.0)"
// 					},
// 				]
// 			},
// 			options:
// 			{
// 				title:
// 				{
// 					display: true,
// 					text: 'Officer vs Products Invoices'
// 				}
// 			}
// 		}
// );


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

@endsection