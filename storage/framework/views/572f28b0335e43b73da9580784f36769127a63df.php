<?php $__env->startSection('content'); ?>
<?php if(auth()->user()->id_group == 1 ): ?> 
	<div class="row"><p><a href="<?php echo route('user.create'); ?>" class="btn btn-info">Back to users</a></p></div>
<?php endif; ?>
	<?php echo $__env->make('layout.errorform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('layout.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo Form::model($user, [
						'route' => [
										'user.update',
										$user->id
									],
						'method' => 'PATCH',
						'class' => 'form-horizontal'
					]); ?>


<div class="panel panel-default">
<div class="panel-heading">Edit User</div>
	<div class="panel-body">
		<div class="form-group <?php echo ( count($errors->get('name')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('nam', 'Name :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('text', 'name', $user->name, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']); ?>

			</div>
		</div>

		<div class="form-group <?php echo ( count($errors->get('email')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('email', 'Email :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('text', 'email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']); ?>

			</div>
		</div>

		<div class="form-group <?php echo ( count($errors->get('password')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('pass', 'Password :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']); ?>

			</div>
		</div>

		<div class="form-group <?php echo ( count($errors->get('password_confirmation')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('pass1', 'Password :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Password Confirmation', 'id' => 'pass1']); ?>

			</div>
		</div>

<?php
foreach ($gr as $key) {
	$lm[$key->id] = $key->group;
}
?>
<?php if(auth()->user()->id_group == 1 ): ?> 
		<div class="form-group <?php echo ( count($errors->get('id_group')) ) >0 ? 'has-error' : ''; ?>">
			<?php echo Form::label('ug', 'User Group :', ['class' => 'col-sm-2 control-label']); ?>

			<div class="col-sm-10">
				<?php echo Form::select('id_group', $lm, $user->id_group,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose User Group']); ?>

			</div>
		</div>
<?php else: ?>
		<?php echo Form::hidden('id_group', $user->id_group); ?>

<?php endif; ?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?php echo Form::submit('Update', ['class' => 'btn btn-primary btn-lg btn-block']); ?>

			</div>
		</div>
	<?php echo Form::close(); ?>

</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('jquery'); ?>
	$("input").keyup(function() {
		toUpper(this);
	});
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>