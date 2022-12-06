<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return redirect(route('posts.index'));

//    return view('posts/index');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('users',App\Http\Controllers\UserController::class);
Route::resource('posts',PostController::class);
Route::resource('themes',ThemeController::class);
//
//Route::get('activeusers',[App\Http\Controllers\ActiveUsersController::class,'welcome'])
//    ->name('activeusers.welcome')
//    ->middleware(['auth','check.user.active' ]);//does rhhrough middleware tests in order, so auth must be first
////  phase 2:: add middleware for allow if auth user's role is UserAdmin
