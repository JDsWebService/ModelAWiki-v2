<?php

namespace App\Http\Middleware;

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

        switch ($guard) {
            // If guard is admin guard
            case 'admin':
                // Check if authenticated as an admin
                if (Auth::guard($guard)->check()) {
                    // If so, return the admin index page
                    return redirect()->route('admin.dashboard');
                }
                break;
            
            // Default should be user auth
            default:
                // Check if logged in as user
                if (Auth::guard($guard)->check()) {
                    // If so return to User Homepage
                    return redirect()->route('user.dashboard');
                }
                break;
        }
        
        // If all else fails return the next request
        return $next($request);
    }
}
