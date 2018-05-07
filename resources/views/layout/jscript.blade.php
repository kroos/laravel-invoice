<script type="text/javascript">
	jQuery.noConflict ();
	(function($){
		$(document).ready(function(){

			$('#example').DataTable({
				// paging: false,
				"lengthMenu": [ [50, -1], [50, "All"] ],
				// responsive: true
			});

			@section('jquery')
			@show
		});
	})(jQuery);
</script>