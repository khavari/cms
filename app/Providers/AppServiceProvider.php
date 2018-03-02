<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


//        $locales = locale('keys');
//        if (count(request()->segments()) == 0 && request()->hasCookie('locale')) {
//            $locale = Cookie::get('locale');
//        }
//        elseif (count(request()->segments()) == 1 && in_array(request()->segment(1), $locales)) {
//            $locale = request()->segment(1);
//        }
//        elseif (count(request()->segments()) > 1 && in_array(request()->segment(1), $locales)) {
//            $locale = request()->segment(1);
//        }
//        else {
//            $locale = config('app.fallback_locale');
//        }
//        session()->put('locale', $locale);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
