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

	<div class="row"><a href="{!! route('categories.create') !!}" class="btn btn-info">Back to categories</a></div>

	{!! Form::model($categories, [
						'route' => [
										'categories.update',
										$categories->id
									],
						'method' => 'PATCH'
					], [
						'class' => 'form-horizontal'
					]) !!}
		<div class="form-group {!! ( count($errors->get('category')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('cate', 'Category :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'category', $categories->category, ['class' => 'form-control', 'placeholder' => 'Category', 'id' => 'cate']) !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						{!! Form::checkbox('active', 1, ((strlen($categories->active) <= 0 ) ? NULL : 'TRUE') ) !!}&nbsp;Aktif
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>

@endsection