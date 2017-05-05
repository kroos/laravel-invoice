<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layout.errorform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('layout.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo Form::open(['route' => 'user.store', 'class' => 'form-horizontal']); ?>

<div class="panel panel-default">
<div class="panel-heading">Add User</div>
	<div class="panel-body">
	<div class="form-group <?php echo ( count($errors->get('name')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('nam', 'Name :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('text', 'name', @$value, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']); ?>

			</div>
		</div>
		
		<div class="form-group <?php echo ( count($errors->get('email')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('email', 'Email :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('text', 'email', @$value, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']); ?>

			</div>
		</div>
		
		<div class="form-group <?php echo ( count($errors->get('password')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('pass', 'Password :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('password', 'password', @$value, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']); ?>

			</div>
		</div>
		
		<div class="form-group <?php echo ( count($errors->get('password_confirmation')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('us', 'Password :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('password', 'password_confirmation', @$value, ['class' => 'form-control', 'placeholder' => 'Password Confirmation', 'id' => 'us']); ?>

			</div>
		</div>
		
		<?php
		foreach ($gr as $key) {
			$lm[$key->id] = $key->group;
		}
		?>
		
		<div class="form-group <?php echo ( count($errors->get('id_group')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('ug', 'User Group :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::select('id_group', $lm, NULL,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose User Group']); ?>

			</div>
		</div>
		
		
		
		
		
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?php echo Form::submit('Save', ['class' => 'btn btn-primary btn-lg btn-block']); ?>

			</div>
		</div>
			<?php echo Form::close(); ?></div>
</div>
</div>

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Users List</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<div class="row ">
					<div class="col-lg-10 table-responsive col-centered">
				
				<?php
				// dt-responsive nowrap
				?>
				
					<?php if( count($us) > 0 ): ?>
						<table id="example" class="table table-border table-hover ">
							<thead>
								<th>id</th>
								<th>name</th>
								<th>email</th>
								<th>group</th>
								<th>delete</th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><a href="<?php echo route('user.edit', $k->id); ?>" class="btn btn-info">edit <?php echo $k->id; ?></a></td>
										<td><?php echo $k->name; ?></td>
										<td><?php echo $k->email; ?></td>
											<?php
											// refer to users model
											$use = \App\UserGroup::findOrFail($k->id_group);
											?>
										<td><?php echo $use->group; ?></td>
										<td><?php if($k->id != 1): ?>
											<?php echo Form::open(['route' => ['user.destroy', $k->id],'method' => 'delete',]); ?>

												<?php echo Form::submit('padam '.$k->id, ['class' => 'btn btn-danger remove']); ?>

											<?php echo Form::close(); ?>

											<?php else: ?>
											<button class="btn btn-info"><?php echo $k->id; ?></button>
											<?php endif; ?>
										</td>
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
<?php $__env->stopSection(); ?>


<?php $__env->startSection('jquery'); ?>
<!-- 	$("input").keyup(function() {
		toUpper(this);
	}); -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>