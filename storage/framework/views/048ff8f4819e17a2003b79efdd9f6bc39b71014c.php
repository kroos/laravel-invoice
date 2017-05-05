<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layout.errorform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('layout.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
		<p class="text-right"><a href="<?php echo route('sales.create'); ?>" class="btn btn-info">New Invoice</a></p>
			<div class="col-lg-12 table-responsive">

				<table id="example" class="table table-hover">
					<thead>
						<?php if(auth()->user()->id_group == 1): ?>
						<th>officer</th>
						<?php endif; ?>
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
							$inv = App\Sales::where(['deleted_at' => NULL])->get();
						} else {
							$inv = App\Sales::where(['deleted_at' => NULL, 'id_user' => auth()->user()->id])->get();
						}
						
						?>
						<?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
							<?php if(auth()->user()->id_group == 1): ?>
							<td><?php echo App\User::find($in->id_user)->name; ?></td>
							<?php endif; ?>
							<td><a href="<?php echo route('sales.edit', $in->id); ?>" class="btn btn-info">edit <?php echo $in->id; ?></a></td>
							<td><?php echo my($in->date_sale); ?></td>
							<td><?php echo $in->no_tracking; ?></td>
<!-- 							<td>
								<?php
									$slip = App\SlipPostage::where(['id_sales' => $in->id])->get();
									foreach ( $slip as $imu ) {
										echo '<img src="data:'.$imu->mime.';base64, '.$imu->image.'" class="img-responsive img-rounded">';
									}
								?>
							</td> -->
							<td>RM <?php echo $tcomm; ?></td>
							<td>RM <?php echo $tamo; ?></td>
							<td>RM <?php echo $paya; ?></td>
							<td><p class="btn <?php echo ($re < 0)? 'btn-danger' : 'btn-success' ?>"><?php echo ($re < 0)? 'Pending' : 'Paid' ?></p></td>
							<td><a href="<?php echo route('sales.destroy', $in->id); ?>" class="btn btn-danger" >delete <?php echo $in->id; ?></a></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>