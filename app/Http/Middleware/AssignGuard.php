<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AssignGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null ,$redirectTo )
    {
        if(!Auth::guard($guard)->check()){
            return redirect($redirectTo);
        }
        Auth::shouldUse();
        return $next($request);
    }
}
