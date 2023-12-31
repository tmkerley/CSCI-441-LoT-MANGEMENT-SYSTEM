<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     public function handle(Request $request, Closure $next, ... $roles){

        //admin == 1
        //tech == 0
         if (Auth::check()) {
            if(Auth::user()->role == 1) {
                return $next($request);
            }
            else {
                return redirect('/cars');

            }
         }

         else {
                return redirect('/login')->with('status', 'Please login to accees the website');

            }
     }

}