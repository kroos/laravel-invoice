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
						<th>&nbsp;</th>
						<th>customer</th>
						<th>address</th>
						<th>postcode</th>
						<th>phone</th>
						<th>email</th>
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
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										<li role="separator" class="divider"></li>
										<li><a href="{!! route('customers.edit', $in->id) !!}" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; edit</a></li>
										<li><a href="{!! route('customers.destroy', $in->id) !!}" ><i class="fa fa-trash fa-lg" aria-hidden="true"></i>&nbsp;&nbsp; delete</a></li>
										<li role="separator" class="divider"></li>
									</ul>
								</div>
							</td>
							<td>{!! $in->client !!}</td>
							<td>{!! $in->client_address !!}</td>
							<td>{!! $in->client_postcode !!}</td>
							<td>{!! $in->client_phone !!}</td>
							<td>{!! $in->client_email !!}</td>
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