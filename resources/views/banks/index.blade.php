@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Banks and Financial Institutions</div>
		<div class="panel-body">
		<p class="text-right"><a href="{!! route('banks.create') !!}" class="btn btn-info">New Bank</a></p>
			<div class="col-lg-12 table-responsive">

				<table id="example" class="table table-hover">
					<thead>
						<th>bank</th>
						<th>city</th>
						<th>swift code</th>
						<th>account number</th>
						<th>active</th>
						<th>edit</th>
					</thead>
					<tbody>
						<?php
							$inv = App\Banks::all();
						?>
						@foreach($inv as $in)
						<tr>
							<td>{!! $in->bank !!}</td>
							<td>{!! $in->city !!}</td>
							<td>{!! $in->swift_code !!}</td>
							<td>{!! $in->account !!}</td>
							<td>
								<a href="{!! route('banks.active', $in->id) !!}" class="btn <?=($in->active == 1)?'btn-success':'btn-danger' ?> "><?=($in->active == 1)?'active':'inactive' ?></a>
							</td>
							<td>
								<a href="{!! route('banks.edit', $in->id) !!}" title="Edit"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
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