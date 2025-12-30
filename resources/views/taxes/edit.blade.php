@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('taxes.update', $taxes->slug) }}" accept-charset="UTF-8" id="form" autocomplete="off" class="needs-validation" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="card">
		<div class="card-header">Taxes</div>
		<div class="card-body">
			<p>Please take note that the tax amount is in the percentage.</p>
			@include('taxes._form')
		</div>
		<div class="card-footer d-flex justify-content-end">
			<button type="submit" class="btn btn-sm btn-outline-primary me-1 my-auto"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
			<a href="{{ route('taxes.index') }}" class="btn btn-sm btn-outline-secondary me-1 my-auto">Cancel</a>
		</div>
	</div>
</form>
@endsection


@section('jquery')
////////////////////////////////////////////////////////////////////////////////////
// uppercase input for tracking number and customer section

	$(document).on('keyup', 'input', function () {
		toUppercase(this);
	});

	function toUppercase(obj) {
		var mystring = obj.value;
		var sp = mystring.split(' ');
		var wl=0;
		var f ,r;
		var word = new Array();
		for (i = 0 ; i < sp.length ; i ++ ) {
			f = sp[i].substring(0,1).toUpperCase();
			r = sp[i].substring(1).toUpperCase();
			word[i] = f+r;
		}
		newstring = word.join(' ');
		obj.value = newstring;
		return true;
	}
@endsection
