<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotUser
{
	public function handle($request, Closure $next)
	{
		if ( ! $request->user()->notUser( $request->route()->user->id ) ) {
			return redirect()->back();
		}
		return $next($request);
	}
}
