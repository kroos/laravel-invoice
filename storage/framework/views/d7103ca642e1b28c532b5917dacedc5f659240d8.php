<?php $__env->startSection('content'); ?>

user index page

<?php $__env->stopSection(); ?>


<?php $__env->startSection('jquery'); ?>
	$("input").keyup(function() {
		toUpper(this);
	});
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>