@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-header">Home</div>
    <div class="card-body">
        <h1 class="text-center text-uppercase">{{ config('app.name') }}</h1>
        <h2 class="text-center">{{ \App\Preferences::find(1)->company_name }}</h2>
        <h3 class="text-center">{{ \App\Preferences::find(1)->company_tagline }}</h3>
    </div>
</div>
@endsection

@section('jquery')
@endsection
