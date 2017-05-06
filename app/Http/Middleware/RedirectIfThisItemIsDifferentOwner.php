<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfThisItemIsDifferentOwner
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
        // dd( $request->route()->sales->id_user );
        // dd( $request->route()->parameters() );

        // foreach ($request->route()->parameters() as $key => $value) {
        //     echo $key.'<br />';
        //     echo $value->id_user.'<br />';
        // }

        if ( ! $request->user()->OwnerOfThisItem( $request->route()->sales->id_user ) ) {
            return redirect()->back();
        }
        return $next($request);
    }
}
