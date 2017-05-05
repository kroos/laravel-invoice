<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layout.errorform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('layout.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="col-lg-12">
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Add Product</div>
			<div class="panel-body">
				<?php echo Form::open(['route' => 'product.store', 'class' => 'form-horizontal', 'files' => true]); ?>

				<?php echo Form::hidden('id_user', auth()->id()); ?>

				<div class="form-group <?php echo ( count($errors->get('product')) ) >0 ? 'has-error' : ''; ?>">
					<?php echo Form::label('pr', 'Product :', ['class' => 'col-sm-2 control-label']); ?>

					<div class="col-sm-10">
						<?php echo Form::input('text', 'product', @$value, ['class' => 'form-control', 'placeholder' => 'Product', 'id' => 'pr']); ?>

					</div>
				</div>
		
				<div class="form-group <?php echo ( count($errors->get('retail')) ) >0 ? 'has-error' : ''; ?>">
					<?php echo Form::label('co', 'Retail :', ['class' => 'col-sm-2 control-label']); ?>

					<div class="col-sm-10">
						<?php echo Form::input('text', 'retail', @$value, ['class' => 'form-control', 'placeholder' => 'Retail in RM', 'id' => 'co']); ?>

					</div>
				</div>
		
				<div class="form-group <?php echo ( count($errors->get('commission')) ) >0 ? 'has-error' : ''; ?>">
					<?php echo Form::label('com', 'Commission :', ['class' => 'col-sm-2 control-label']); ?>

					<div class="col-sm-10">
						<?php echo Form::input('text', 'commission', @$value, ['class' => 'form-control', 'placeholder' => 'Commission in RM', 'id' => 'com']); ?>

					</div>
				</div>
				<?php
				$r = array();
				foreach ($cate as $key) {
					$r[$key->id] = $key->product_category;
				}
				?>
				<div class="form-group <?php echo ( count($errors->get('id_category')) ) >0 ? 'has-error' : ''; ?>">
					<?php echo Form::label('cat', 'Category :', ['class' => 'col-sm-2 control-label']); ?>

					<div class="col-sm-10">
						<?php echo Form::select('id_category', $r, NULL, ['class' => 'form-control', 'placeholder' => 'Choose Category', 'id' => 'cat']); ?>

					</div>
				</div>
		
				<div class="form-group <?php echo ( count($errors->get('image[]')) ) >0 ? 'has-error' : ''; ?>">
					<?php echo Form::label('img', 'Image :', ['class' => 'col-sm-2 control-label']); ?>

					<div class="col-sm-10">
						<?php echo Form::file('image[]', ['id' => 'img', 'multiple' => 'multiple']); ?>

					</div>
				</div>
		
		
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
								<?php echo Form::input('checkbox', 'active', TRUE, @$value); ?>&nbsp;Active
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<?php echo Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']); ?>

					</div>
				</div>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>
	
	<div class="row ">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Product List</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="col-lg-10 table-responsive col-centered">
					
					<?php
					// dt-responsive nowrap
					?>
					
				<?php if( count($pro) > 0 ): ?>
					<table id="example" class="table table-border table-hover ">
						<thead>
							<th>id</th>
							<th>product</th>
							<th>category</th>
							<th>retail</th>
							<th>commission</th>
							<th>active</th>
							<th>image</th>
							<th>delete</th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><a href="<?php echo route('product.edit' ,$k->id); ?>" class="btn btn-info">edit <?php echo $k->id; ?></a></td>
									<td><?php echo $k->product; ?></td>
									<td><?php echo App\ProductCategory::find($k->id_category)->product_category; ?></td>
									<td>RM <?php echo number_format($k->retail, 2); ?></td>
									<td>RM <?php echo number_format($k->commission, 2); ?></td>
									<td><?php echo ($k->active == 1) ? 'active' : 'tidak aktif'; ?></td>
									<td>
										<?php
												$imge = App\Product::find($k->id)->productimage;
												foreach ($imge as $imu ) {
													echo '<img src="data:'.$imu->mime.';base64, '.$imu->image.'" class="img-responsive img-rounded">';
												}
												
										?>
									</td>
									<td><a href="<?php echo route('product.destroy', $k->id); ?>" class="btn btn-danger remove">delete <?php echo $k->id; ?></a></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				<?php else: ?>
				<?php endif; ?>
				</div>
					</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('jquery'); ?>
	$("input").keyup(function() {
		toUpper(this);
	});
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>