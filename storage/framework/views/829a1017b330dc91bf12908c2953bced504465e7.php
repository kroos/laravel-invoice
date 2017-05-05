<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layout.errorform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('layout.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Banks and Financial Institutions</div>
		<div class="panel-body">
			<div class="col-lg-12 table-responsive">

				<table id="example" class="table table-hover">
					<thead>
						<th>id</th>
						<th>bank</th>
						<th>city</th>
						<th>swift code</th>
						<th>no account</th>
						<th>active</th>
					</thead>
					<tbody>
						<?php
							$inv = App\Banks::all();
						?>
						<?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<p>
									<a href="<?php echo route('banks.edit', $in->id); ?>" class="btn btn-info">Edit <?php echo $in->id; ?></a>
								</p>
								</td>
							<td><?php echo $in->bank; ?></td>
							<td><?php echo $in->city; ?></td>
							<td><?php echo $in->swift_code; ?></td>
							<td><?php echo $in->account; ?></td>
							<td>
								<p><a href="<?php echo route('banks.active', $in->id); ?>" class="btn <?=($in->active == 1)?'btn-success':'btn-danger' ?> "><?=($in->active == 1)?'active':'inactive' ?></a></p>
							</td>
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