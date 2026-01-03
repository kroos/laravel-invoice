<h2>{{ __('Delete Account') }}</h2>

<p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>

<button type="button" class="btn btn-danger m-3" data-bs-toggle="modal" data-bs-target="#deuser">Delete Account</button>

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="deuser" tabindex="-1" aria-labelledby="deleuser" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<form method="post" action="{{ route('profile.destroy') }}" class="p-6">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="deleuser">Modal title</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					@csrf
					@method('delete')

					<h2 class="tw-text-lg tw-font-medium tw-text-gray-900">
						{{ __('Are you sure you want to delete your account?') }}
					</h2>

					<p class="tw-mt-1 tw-text-sm tw-text-gray-600">
						{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
					</p>

					<div class="mt-6">
						<div class="form-group row m-2 @error('password') has-error @enderror">
							<label for="password" class="col-sm-4 col-form-label col-form-label-sm">Password : </label>
							<div class="col-sm-8">
								<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Password">
								@error('password') <div class="invalid-feedback fw-lighter">{{ $message }}</div> @enderror
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger">Delete Account</button>
				</div>
			</div>
		</form>
	</div>
</div>
