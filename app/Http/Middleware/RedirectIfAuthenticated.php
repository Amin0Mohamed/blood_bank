<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'client':
                if (Auth::guard($guard)->check()) {
                    return redirect('client.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
                break;
        }

        return $next($request);
    }
}
