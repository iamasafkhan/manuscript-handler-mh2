<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPublisher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->userType == 'Publisher')
        {

            return $next($request);

        }
       
        else
        {

         return redirect()->route('esubmit-login')
         ->with('message','you must be in Publisher to view this page.');


        }
    }
}
