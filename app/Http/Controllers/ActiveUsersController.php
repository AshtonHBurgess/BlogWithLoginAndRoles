<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveUsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.user.active')->except('welcome');
//    $this->middleware('check.user.active')->only('welcome');
        //want this middleware to run for every crud exept for one
        //-

    }
    public function welcome()
    {
        //send to a welcome active users page
        return view('activeusers.welcome');

    }
}
