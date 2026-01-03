<!-- IF ERROR -->
@if(Session::has('error'))
	<h6 class="pb-4 mb-4 border-bottom text-center alert alert-danger">
		{{ Session::get('error') }}
	</h6>
@endif
