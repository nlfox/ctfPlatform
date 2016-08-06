<?php namespace App\Http\Middleware;

use App\Settings;
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class GameMiddleware
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
        if (!Settings::getStat()->value) {
            return view('message')->with(array
                (
                    "stat" => 0,
                    "msg" => 'Game not started yet',
                    "url" => 'home'
                )
            );
        } else {
            return $next($request);
        }
    }

}
