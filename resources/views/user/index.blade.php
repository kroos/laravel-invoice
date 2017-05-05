@extends('layout.master')

@section('content')

user index page

@endsection


@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});
@endsection