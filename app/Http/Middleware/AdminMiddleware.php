<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isadmin) {
            return view('message')->with(
                array
                (
                    "stat" => 0,
                    "msg" => 'not admin',
                    "url" => 'login'
                )
            );
        } else {
            return $next($request);
        }
    }

}
