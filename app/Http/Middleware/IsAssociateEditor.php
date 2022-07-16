<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAssociateEditor
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
        if(auth()->check() && auth()->user()->userType== 'AssociateEditor')
        {

            return $next($request);

        }
       
        else
        {

         return redirect()->route('esubmit-login')
         ->with('message','you must be in Associate Editor to view this page.');

        }
    }
}
