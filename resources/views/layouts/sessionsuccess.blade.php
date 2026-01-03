<!-- IF SUCCESS -->
@if(Session::has('success'))
	<h6 class="pb-4 mb-4 border-bottom text-center alert alert-success">
		{{ Session::get('success') }}
	</h6>
@endif

