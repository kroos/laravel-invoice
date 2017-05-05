@extends('layout.master')

@section('content')

	@include('layout.errorform')
	@include('layout.info')
{!! Form::open(['route' => 'auth.store', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Login</div>
		<div class="panel-body">

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group {!! ( count($errors->get('email')) ) > 0 ? 'has-error' : '' !!}">
						{!! Form::label('na', 'Email :', ['class' => 'control-label col-lg-2']) !!}
						<div class="col-lg-10">
							{!! Form::input('text', 'email', @$value, ['class' => 'form-control', 'id' => 'na', 'placeholder' => 'Email', 'autocomplete' => 'on']) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group {!! ( count($errors->get('password')) ) > 0 ? 'has-error' : '' !!}">
						{!! Form::label('pas', 'Password :', ['class' => 'control-label col-lg-2']) !!}
						<div class="col-lg-10">
							{!! Form::input('password', 'password', @$value, ['class' => 'form-control', 'id' => 'pas', 'placeholder' => 'Password']) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									{!! Form::input('checkbox', 'remember', TRUE, @$value) !!}&nbsp;Remember me
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							{!! Form::submit('Login', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<p><a class="btn btn-link" href="{!! route('forgotpassword.create') !!}">Forgot Your Password?</a></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

{!! Form::close() !!}

@endsection


@section('jquery')
<!-- 	$("input").keyup(function() {
		toUpper(this);
	}); -->
@endsection