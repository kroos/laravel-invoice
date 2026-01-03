		<h2>{{ __('Update Password') }}</h2>

		<p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

	<form method="post" action="{{ route('password.update') }}">
		@csrf
		@method('PUT')

		<div class="form-group row m-2 @error('current_password') has-error @enderror">
			<label for="current_password" class="col-sm-4 col-form-label col-form-label-sm">Current Password : </label>
			<div class="col-sm-8">
				<input type="password" name="current_password" id="current_password" value="{{ old('current_password') }}" class="form-control form-control-sm @error('current_password') is-invalid @enderror" placeholder="Current Password">
				@error('current_password') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
			</div>
		</div>

		<div class="form-group row m-2 @error('password') has-error @enderror">
			<label for="password" class="col-sm-4 col-form-label col-form-label-sm">New Password : </label>
			<div class="col-sm-8">
				<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="New Password">
				@error('password') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
			</div>
		</div>

		<div class="form-group row m-2 @error('password_confirmation') has-error @enderror">
			<label for="password_confirmation" class="col-sm-4 col-form-label col-form-label-sm">Confirm Password : </label>
			<div class="col-sm-8">
				<input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
				@error('password_confirmation') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
			</div>
		</div>

		<div class="col-sm-12 justify-self-end m-4">
			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Save') }}
			</button>
			@if (session('status') === 'password-updated')
				<p class="tw-text-sm tw-text-gray-600">{{ __('Saved.') }}</p>
			@endif
		</div>

	</form>
