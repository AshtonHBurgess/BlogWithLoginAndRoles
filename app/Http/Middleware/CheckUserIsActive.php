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
       $roles =Auth::user()->roles;// get the current logged in user
         $tr=false;
        foreach($roles as $role) {
            if ($role->id == 1) {
                $tr = true;
            }
        }
        if($tr){

            return $next($request);
        }
        return redirect()->back()->with('status','you are not an active user... access denied');
//        return $next($request);// allow the request to proceed on
//        dd('Not_Active');





    }
}
