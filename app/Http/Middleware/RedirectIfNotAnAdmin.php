<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAnAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // create this method on a User model => isAnAdmin
        if ( ! $request->user()->isAdmin() ) {
            return abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
