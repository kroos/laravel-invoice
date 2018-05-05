<script type="text/javascript">
	jQuery.noConflict ();
	(function($){
		$(document).ready(function(){

			$('#example').DataTable({
				// paging: false,
				"lengthMenu": [ [50, -1], [50, "All"] ],
				// responsive: true
			});

			$(document).on('mouseenter', 'select', function () {
				// $(this).select2();
			});

			// $('select').select2();
			
			@section('jquery')
			@show
		});
	})(jQuery);
</script>