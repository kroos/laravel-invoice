@extends('nav')

@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});
@endsection


@section('content')
<div class="col-lg-8 col-lg-offset-2">

	@include('partial.errorform')
	@include('partial.info')

	{!! Form::open(['route' => 'product.store', 'class' => 'form-horizontal', 'files' => true]) !!}
	{!! Form::hidden('id_user', auth()->id()) !!}


		<div class="form-group {!! ( count($errors->get('product')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pr', 'Product :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'product', @$value, ['class' => 'form-control', 'placeholder' => 'Product', 'id' => 'pr']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('retail')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('co', 'Retail :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'retail', @$value, ['class' => 'form-control', 'placeholder' => 'Retail in RM', 'id' => 'co']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('commission')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('com', 'Commission :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'commission', @$value, ['class' => 'form-control', 'placeholder' => 'Commission in RM', 'id' => 'com']) !!}
			</div>
		</div>
<?php
foreach ($cate as $key) {
 	$r[$key->id] = $key->category;
 }
?>
		<div class="form-group {!! ( count($errors->get('id_category')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('cat', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::select('id_category', $r, NULL, ['class' => 'form-control', 'placeholder' => 'Choose Category', 'id' => 'cat']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('image[]')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('img', 'Image :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
			{!! Form::file('image[]', ['id' => 'img', 'multiple' => 'multiple']) !!}
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						{!! Form::input('checkbox', 'active', TRUE, @$value) !!}&nbsp;Active
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>

<div class="row ">
	<div class="col-lg-10 table-responsive col-centered">

<?php
// dt-responsive nowrap
?>

	@if( count($pro) > 0 )
		<table id="example" class="table table-border table-hover ">
			<thead>
				<th>id</th>
				<th>product</th>
				<th>category</th>
				<th>retail</th>
				<th>commission</th>
				<th>active</th>
				<th>image</th>
				<th>padam?</th>
			</thead>
			<tfoot>
				<td>id</td>
				<td>product</td>
				<td>category</td>
				<td>retail</td>
				<td>commission</td>
				<td>active</td>
				<td>image</td>
				<td>padam?</td>
			</tfoot> 
			<tbody>
				@foreach ($pro as $k)
					<tr>
						<td>{!! $k->id !!}</td>
						<td>{!! $k->product !!}</td>
						<td>{!! App\Categories::find($k->id_category)->category !!}</td>
						<td>RM {!! number_format($k->retail, 2) !!}</td>
						<td>RM {!! number_format($k->commission, 2) !!}</td>
						<td>{!! ($k->active == 1) ? 'active' : 'tidak aktif' !!}</td>
						<td>
							<?php
									$imge = App\Product::findOrFail($k->id)->productimage;
									foreach ($imge as $imu ) {
										echo '<img src="data:'.$imu->mime.';base64, '.$imu->image.'" class="img-responsive img-rounded">';
									}
									
							?>
						</td>
						<td><a href="{!! route('product.destroy', $k->id) !!}" class="btn btn-danger remove">padam {!! $k->id !!}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
	@endif
	</div>
</div>
@endsection