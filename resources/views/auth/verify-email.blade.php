@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	@if (session('status') == 'verification-link-sent')
		<div class="my-4 col-sm-12 text-sm text-center text-success">
			{{ __('A new verification link has been sent to the email address you provided during registration.') }}
		</div>
	@endif

	<div class="col-sm-12 row mx-auto justify-content-center">

		<div class="card">
			<div class="card-header">
				<h3>Email Verification</h3>
			</div>
			<div class="card-body">
				<p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-auto">
						<form method="POST" action="{{ route('verification.send') }}" id="form" class="needs-validation">
							@csrf
							<div class="col">
								<button type="submit" class="btn btn-sm btn-primary m-0">
									{{ __('Resend Verification Email') }}
								</button>
							</div>
						</form>
					</div>

					<div class="col-auto">
						<form method="POST" action="{{ route('logout') }}" id="form" class="needs-validation">
							@csrf
							<div class="col">
								<button type="submit" class="btn btn-sm btn-primary m-0">
									{{ __('Log Out') }}
								</button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>
@endsection

@section('js')
@endsection
