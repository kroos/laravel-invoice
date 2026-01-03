<?php

namespace App\Extensions\Auth;

use Illuminate\Support\ServiceProvider;


// using this to override Illuminate\Auth\EloquentUserProvider
// what to override
use Closure;
use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

// use Illuminate\Contracts\Auth\Authenticatable as UserContract;
// use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Support\Arrayable;

// class EloquentUserProvider extends ServiceProvider
class EloquentUserProvider extends UserProvider
{
	/**
	 * The hasher implementation.
	 *
	 * @var \Illuminate\Contracts\Hashing\Hasher
	 */
	protected $hasher;

	/**
	 * The Eloquent user model.
	 *
	 * @var string
	 */
	protected $model;

	/**
	 * The callback that may modify the user retrieval queries.
	 *
	 * @var (\Closure(\Illuminate\Database\Eloquent\Builder<*>):mixed)|null
	 */
	protected $queryCallback;

	/**
	 * Create a new database user provider.
	 *
	 * @param  \Illuminate\Contracts\Hashing\Hasher  $hasher
	 * @param  string  $model
	 * @return void
	 */
	public function __construct(HasherContract $hasher, $model)
	{
		$this->model = $model;
		$this->hasher = $hasher;
		// dd($this->model, $this->hasher);
		// dd($this->model->getAuthIdentifierName());
	}

	/**
	 * Retrieve a user by their unique identifier.
	 *
	 * @param  mixed  $identifier
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveById($identifier)
	{
		$model = $this->createModel();
		// dd($model->getAuthIdentifierName());
		return $this->newModelQuery($model)
								->where($model->getAuthIdentifierName(), $identifier)
								->first();
								// ->ddRawSql();
	}

	/**
	 * Retrieve a user by their unique identifier and "remember me" token.
	 *
	 * @param  mixed  $identifier
	 * @param  string  $token
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function retrieveByToken($identifier, #[\SensitiveParameter] $token)
	{
		$model = $this->createModel();

		$retrievedModel = $this->newModelQuery($model)->where(
				$model->getAuthIdentifierName(), $identifier
		)->first();

		if (! $retrievedModel) {
				return;
		}

		$rememberToken = $retrievedModel->getRememberToken();

		return $rememberToken && hash_equals($rememberToken, $token) ? $retrievedModel : null;
	}

//	to prevent laravel AUTO hash password in DB if its used plain or or uses an old hashing driver
//	public function rehashPasswordIfRequired($user, array $credentials, $validated = true)
//	{
//    // Disable Laravel’s auto password rehash feature
//		return;
//	}

//	public function validateCredentials(UserContract $user, array $credentials)
//	{
//		$plain = $credentials['password'];
//		// dd($plain, $credentials['password']);
//		// this is for plain text user password
//		// dd($plain, $user->getAuthPassword());
//		// if ($plain == $user->getAuthPassword() && $user->belongstouser->status == true) {
//		// 	return true;
//		// } else {
//		// 	return false;
//		// }
//		dd($this->hasher->check($plain, $user->getAuthPassword()));
//		return ($this->hasher->check($plain, $user->getAuthPassword()) && $user->belongstouser->status == true);
//	}

	public function validateCredentials(UserContract $user, #[\SensitiveParameter] array $credentials)
	{
		// dd($credentials['password'], $user->getAuthPassword(), $this->hasher->check($credentials['password'], $user->getAuthPassword()), $this->hasher->info($user->getAuthPassword()), $this->hasher->make($credentials['password']));
		if (is_null($plain = $credentials['password'])) {
			return false;
		}

		if (is_null($hashed = $user->getAuthPassword())) {
			return false;
		}

		// return $this->hasher->check($plain, $hashed);
		// return ($this->hasher->check($plain, $hashed) && $user->belongstouser->active == true && $user->active == true);
		return ($this->hasher->check($plain, $hashed));

	}
}
