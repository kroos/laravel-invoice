	@if ($errors->any())
		<div class="col-sm-12 d-flex align-items-center justify-content-center">
			<ul class="list-group">
				@foreach ($errors->all() as $error)
					<li class="list-group-item list-group-item-danger">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
