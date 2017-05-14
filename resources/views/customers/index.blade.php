@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Customers List</div>
		<div class="panel-body">
			<div class="col-lg-12 table-responsive">

				<table id="example" class="table table-hover">
					<thead>
						<th>id</th>
						<th>customer</th>
						<th>address</th>
						<th>postcode</th>
						<th>phone</th>
						<th>email</th>
						<th>delete</th>
					</thead>
					<tbody>
						<?php
							if ( auth()->user()->id_group == 1 ) {
								$inv = App\Customers::withTrashed()->get();
							} else {
								$inv = App\Customers::all();
							}
							
							$inv = App\Customers::all();
						?>
						@foreach($inv as $in)
						<tr>
							<td>
								<p>
									<a href="{!! route('customers.edit', $in->id) !!}" class="btn btn-info">Edit {!! $in->id !!}</a>
								</p>
								</td>
							<td>{!! $in->client !!}</td>
							<td>{!! $in->client_address !!}</td>
							<td>{!! $in->client_postcode !!}</td>
							<td>{!! $in->client_phone !!}</td>
							<td>{!! $in->client_email !!}</td>
							<td>
								<p><a href="{!! route('customers.destroy', $in->id) !!}" class="btn btn-danger">delete <?=$in->id?></a></p>
							</td>
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