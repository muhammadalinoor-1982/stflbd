<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->user_role=='admin')
            {
            return redirect('dashboard.index');
            }
            if(Auth::user()->user_role=='superviso')
            {
                return redirect('dashboard.index');
            }
            if(Auth::user()->user_role=='operator')
            {
                return redirect('dashboard.index');
            }
            elseif (Auth::user()->user_role=='customer')
            {
                return redirect('/Frontend');
            }

        }

        return $next($request);
    }
}
