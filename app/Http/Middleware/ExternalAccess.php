<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExternalAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
        ->header('Access-Control-Allow-Origin', "*")
        ->header('Access-Control-Allow-Methods', "POST, GET, DELETE, PUT, PATCH, OPTIONS")
        ->header('Access-Control-Allow-Headers', "token, Content-Type")
        ->header('Access-Control-Max-Age', "1728000");
    }
}
