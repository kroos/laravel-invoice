<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layout.errorform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('layout.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Tax List</div>
		<div class="panel-body">
			<div class="col-lg-12 table-responsive">
				<p class="text-right"><a href="<?php echo route('taxes.create'); ?>" class="btn btn-info">New Tax</a></p>			<table id="example" class="table table-hover">
					<thead>
						<th>edit</th>
						<th>tax</th>
						<th>charges (%)</th>
						<th>delete</th>
					</thead>
					<tbody>
						<?php
							$ta = App\Taxes::all();
						?>
						<?php $__currentLoopData = $ta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><p><a href="<?php echo route('taxes.edit', $in->id); ?>" class="btn btn-info">Edit <?php echo $in->id; ?></a></p></td>
							<td><?php echo $in->tax; ?></td>
							<td><?php echo $in->amount; ?></td>
							<td><p><a href="<?php echo route('taxes.destroy', $in->id); ?>" class="btn btn-danger">delete <?=$in->id?></a></p></td>
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