<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserIsActive
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
        Auth::user();// get the current logged in user

//        if(Auth::user()->is_active){
//            return $next($request);// allow the request to proceed on
//        }

        //We are searching in our middleware for the user has a specific role

        user()->role=="admin";



        return redirect()->back()->with('status','you are not an admin user... access denied');
//        return $next($request);// allow the request to proceed on
//        dd('Not_Active');





    }
}
