<?php

namespace App\Http\Middleware;

use App\Models\Forum\ForumCategory;
use App\Models\Forum\ForumSettings;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ForumMiddleware
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
        $categories = ForumCategory::all();
        $settings = ForumSettings::first();

        // Check to see if $categories has any items in collection
        if($categories->count() and $settings) {
            // Pass a 'categories' varible to all forum views
            View::share('categories', $categories);
            // Pass a 'settings' variable to all forum views
            View::share('settings', $settings);
            // Return the users request
            return $next($request);
        } 

        // If you've gotten this far, no categories Exist
        // Flash the Session Message
        Session::flash('warning', 'Forums are currently under construction. Please contact an administrator');
        // Return a redirect to the website homepage
        return redirect()->route('pages.index');
    }
}
