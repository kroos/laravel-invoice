<div class="form-group row m-1 @error('name') has-error @enderror">
	<label for="nam" class="col-form-label col-sm-2">Name : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="name" value="{{ old('name', @$user->name) }}" id="nam" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Name">
		@error('name')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('username') has-error @enderror">
	<label for="usernam" class="col-form-label col-sm-2">Username : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="username" value="{{ old('username', @$user->username) }}" id="usernam" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Username">
		@error('username')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('email') has-error @enderror">
	<label for="email" class="col-form-label col-sm-2">Email : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="email" value="{{ old('email', @$user->email) }}" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email">
		@error('email')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('password') has-error @enderror">
	<label for="pass" class="col-form-label col-sm-2">Password : </label>
	<div class="col-sm-6 my-auto">
		<input type="password" name="password" value="{{ old('password', @$user->password) }}" id="pass" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password">
		@error('password')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('password_confirmation') has-error @enderror">
	<label for="us" class="col-form-label col-sm-2">Password Confirmation : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="password_confirmation" value="{{ old('password_confirmation', @$user->password_confirmation) }}" id="us" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation">
		@error('password_confirmation')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('id_group') has-error @enderror">
	<label for="ug" class="col-form-label col-sm-2">User Group  : </label>
	<div class="col-sm-6 my-auto">
		<select name="id_group" id="ug" class="form-select form-select-sm col-sm-12 @error('id_group') is-invalid @enderror"></select>
		@error('id_group')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>

<div class="form-group row m-1 @error('color') has-error @enderror">
	<label for="rgba" class="col-form-label col-sm-2">Color : </label>
	<div class="col-sm-6 my-auto">
		<input type="text" name="color" value="{{ old('color', @$user->color) }}" id="rgba" class="form-control form-control-sm @error('color') is-invalid @enderror" placeholder="Color">
		@error('color')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
</div>


