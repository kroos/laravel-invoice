<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotUserSales
{
	public function handle($request, Closure $next)
	{
		// dd($request->route()->sale->id_user);
		if ( ! $request->user()->Owner( $request->route()->sale->id_user ) ) {
			return abort(403, 'Unauthorized');
		}
		return $next($request);
	}
}
