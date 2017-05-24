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
						<th>activation</th>
						<th>bank</th>
						<th>city</th>
						<th>swift code</th>
						<th>account number</th>
						<th>active</th>
					</thead>
					<tbody>
						<?php
							$inv = App\Banks::all();
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
										<li><a href="{!! route('banks.edit', $in->id) !!}" >edit</a></li>
										<li role="separator" class="divider"></li>
									</ul>
								</div>
							</td>
							<td>{!! $in->bank !!}</td>
							<td>{!! $in->city !!}</td>
							<td>{!! $in->swift_code !!}</td>
							<td>{!! $in->account !!}</td>
							<td><a href="{!! route('banks.active', $in->id) !!}" class="btn <?=($in->active == 1)?'btn-success':'btn-danger' ?> "><?=($in->active == 1)?'active':'inactive' ?></a></td>
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