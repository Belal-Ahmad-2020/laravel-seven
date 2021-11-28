<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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

        // if this middleware is global 
        //echo "THis is our global middleware that assigned in all views";


        // if middleware is assigned to specific route 
        //dd($request->role);
        if($request->role != "admin") {
            return redirect('/');
        }



        return $next($request);
    }
}
