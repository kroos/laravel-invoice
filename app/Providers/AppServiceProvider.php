<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// extension for auth
use App\Extensions\Auth\EloquentUserProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		Auth::provider('loginuserprovider', function (Application $app, array $config) {
			// Return an instance of Illuminate\Contracts\Auth\UserProvider...
			return new EloquentUserProvider($app['hash'], $config['model']);
		});
	}
}
