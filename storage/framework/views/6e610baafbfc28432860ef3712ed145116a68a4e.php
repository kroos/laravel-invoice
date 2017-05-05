<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('layout.errorform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('layout.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo Form::open(['route' => 'auth.store', 'class' => 'form-horizontal', 'autocomplete' => 'off']); ?>


<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Login</div>
		<div class="panel-body">

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group <?php echo ( count($errors->get('email')) ) > 0 ? 'has-error' : ''; ?>">
						<?php echo Form::label('na', 'Email :', ['class' => 'control-label col-lg-2']); ?>

						<div class="col-lg-10">
							<?php echo Form::input('text', 'email', @$value, ['class' => 'form-control', 'id' => 'na', 'placeholder' => 'Email', 'autocomplete' => 'on']); ?>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group <?php echo ( count($errors->get('password')) ) > 0 ? 'has-error' : ''; ?>">
						<?php echo Form::label('pas', 'Password :', ['class' => 'control-label col-lg-2']); ?>

						<div class="col-lg-10">
							<?php echo Form::input('password', 'password', @$value, ['class' => 'form-control', 'id' => 'pas', 'placeholder' => 'Password']); ?>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<?php echo Form::input('checkbox', 'remember', TRUE, @$value); ?>&nbsp;Remember me
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<?php echo Form::submit('Login', ['class' => 'btn btn-primary btn-lg btn-block']); ?>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<p><a class="btn btn-link" href="<?php echo route('forgotpassword.create'); ?>">Forgot Your Password?</a></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('jquery'); ?>
<!-- 	$("input").keyup(function() {
		toUpper(this);
	}); -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>