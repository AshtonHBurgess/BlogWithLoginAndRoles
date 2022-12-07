<?php

namespace App\Providers;

use App\Models\Theme;
use http\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
//use \Illuminate\Support\Facades\Cookie;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //get a list of themes
//        $themes=Theme::all();
        //pass a list of themes to app . blade .php
        View::composer('layouts.app',function($view){

            //get the cookie value for current theme
            $themeId=\Illuminate\Support\Facades\Cookie::get('theme') ?? 1;

             $view->with('themes',Theme::all())->with('selectedTheme',Theme::find($themeId));

        });

    }
}
