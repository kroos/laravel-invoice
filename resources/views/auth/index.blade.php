@extends('layout.master')

@section('content')

    @include('layout.errorform')
    @include('layout.info')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Home</div>
        <div class="panel-body">
            <h1>WELCOME TO INVOICE SYSTEM MANAGEMENT</h1>
            <p>To begin, please login.</p>
        </div>
    </div>
</div>


@endsection


@section('jquery')
@endsection