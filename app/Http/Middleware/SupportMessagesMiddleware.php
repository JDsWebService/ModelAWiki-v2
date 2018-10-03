<?php

namespace App\Http\Middleware;

use App\Models\Support\Message;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class SupportMessagesMiddleware
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
        $routePath = Route::getFacadeRoot()->current()->uri();

        if(strpos($routePath, 'admin') !== false) {
            $reportCount = Message::where('status', '!=', 'closed')->get()->count();
            if($reportCount > 0) {
                View::share('reportCount', $reportCount);
            }
        }
        
        return $next($request);
    }
}
