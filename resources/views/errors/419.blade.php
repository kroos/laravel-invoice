@extends('layouts.app')

@section('content')

	<div class="tw col-sm-8 text-center">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Error 419 : Session Expired') }}
		</h2>
	</div>

	<div class="col-sm-8 flex justify-content-center" >
		<a href="{{ url('/dashboard') }}" class="">
			<img src="{{ asset('images/errors/419-error.jpg') }}" class="img-fluid rounded " alt="">
		</a>
	</div>
@endsection
