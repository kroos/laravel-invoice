<script type="text/javascript">
	jQuery.noConflict ();
	(function($){
		$(document).ready(function(){
			$('#example').DataTable({
				// paging: false,
				"lengthMenu": [ [50, -1], [50, "All"] ]
			});
			$('.remove').click(function(){
				swal({
					title: "Are you sure?",
					text: "You will not be able to recover this file!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Yes, delete it!",
					cancelButtonText: "No, cancel please!",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm) {
					if (isConfirm) {
						swal("Deleted!", "Your file has been deleted.", "success");
					} else {
						swal("Cancelled", "Your file is safe :)", "error");
					}
				});
			});

			$(document).on('mouseenter', 'select', function () {
				$(this).select2();
			});

			$('select').select2();

			<?php $__env->startSection('jquery'); ?>
			<?php echo $__env->yieldSection(); ?>
		});
	})(jQuery);
</script>