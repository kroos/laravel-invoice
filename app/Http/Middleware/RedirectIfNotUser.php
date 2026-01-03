<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotUser
{
	public function handle($request, Closure $next)
	{
		// dd($request->route());
		if ( ! $request->user()->Owner( $request->route()->user->id ) ) {
			return abort(403, 'Unauthorized');
		}
		return $next($request);
	}
}
