<?php

namespace App\Http\Middleware;

use Closure;



// must update this class in Kernel.php
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
        if ( ! $request->user()->isAnAdmin() ) {
            return redirect()->back();
        }
        return $next($request);
    }
}
