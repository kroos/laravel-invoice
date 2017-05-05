@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Banks and Financial Institutions</div>
		<div class="panel-body">
			<div class="col-lg-12 table-responsive">

				<table id="example" class="table table-hover">
					<thead>
						<th>id</th>
						<th>bank</th>
						<th>city</th>
						<th>swift code</th>
						<th>no account</th>
						<th>active</th>
					</thead>
					<tbody>
						<?php
							$inv = App\Banks::all();
						?>
						@foreach($inv as $in)
						<tr>
							<td>
								<p>
									<a href="{!! route('banks.edit', $in->id) !!}" class="btn btn-info">Edit {!! $in->id !!}</a>
								</p>
								</td>
							<td>{!! $in->bank !!}</td>
							<td>{!! $in->city !!}</td>
							<td>{!! $in->swift_code !!}</td>
							<td>{!! $in->account !!}</td>
							<td>
								<p><a href="{!! route('banks.active', $in->id) !!}" class="btn <?=($in->active == 1)?'btn-success':'btn-danger' ?> "><?=($in->active == 1)?'active':'inactive' ?></a></p>
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