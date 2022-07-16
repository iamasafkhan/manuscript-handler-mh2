<?php

namespace App\Http\Middleware;

use App\Models\MhCompanies;
use App\Models\MhJournals;
use Illuminate\Auth\Middleware\Authenticate as Middleware;



class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $path = $request->getPathInfo();
        $path_params = explode('/' ,$path);
        //dd($path_params);
        //dd($request->pathInfo);


        if (! $request->expectsJson()) {
            //$company = MhCompanies::where('companySEOURL',  $request->company)->first();
            //$journal = MhJournals::where('seo', $request->seo)->first();
            session()->flash('error', 'Your session is expired, please login to continue.');
            //$request->session()->flash('key', $value);
            return route('esubmit-login', [$path_params['1'], $path_params['2']]);
            //return redirect()->route('profile', ['id' => 1]);
            //return redirect()->route('/', ($path_params['1'], $path_params['2']))->with('message', 'Your session is expired, please login to continue.');
            //return redirect()->route('esubmit-login', [$path_params['1'], $path_params['2']])->with('message', 'Your session is expired, please login to continue.');
        }
    }
}
