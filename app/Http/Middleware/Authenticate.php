<?php

namespace App\Http\Middleware;

use ClassPreloader\Config;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Authenticate
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
         $toUrl = 'admin/login/index';
         $domain = config('app.url') . '/' .$toUrl;
        if(!Session::get('user') && Session::get('_previous.url') != $domain) {
           return Redirect::to($toUrl);
        }

        return $next($request);
    }
}
