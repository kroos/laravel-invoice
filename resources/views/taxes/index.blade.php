@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Tax List</div>
		<div class="panel-body">
			<div class="col-lg-12 table-responsive">
				<p class="text-right"><a href="{!! route('taxes.create') !!}" class="btn btn-info">New Tax</a></p>			<table id="example" class="table table-hover">
					<thead>
						<th>edit</th>
						<th>tax</th>
						<th>charges (%)</th>
						<th>delete</th>
					</thead>
					<tbody>
						<?php
							$ta = App\Taxes::all();
						?>
						@foreach($ta as $in)
						<tr>
							<td><p><a href="{!! route('taxes.edit', $in->id) !!}" class="btn btn-info">Edit {!! $in->id !!}</a></p></td>
							<td>{!! $in->tax !!}</td>
							<td>{!! $in->amount !!}</td>
							<td><p><a href="{!! route('taxes.destroy', $in->id) !!}" class="btn btn-danger">delete <?=$in->id?></a></p></td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

@endsection


@section('jquery')

@endsection