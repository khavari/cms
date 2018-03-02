<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class Locale
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


        // IF USER SELECTED A LOCALE let's default with that.
        if ($request->hasCookie('locale')) {
            $this->setApplicationLocale($request->cookie('locale'));
        }





//        if(Cookie::get('locale')){
//            app()->setLocale(Cookie::get('locale'));
//        }else{
//            cookie()->queue('locale', config('app.fallback_locale'));
//            app()->setLocale(config('app.fallback_locale'));
//        }

       // return $next($request);
        return $next($request)->withCookie(cookie()->forever('locale', locale()));
    }





    private function setApplicationLocale($locale)
    {
        app()->setLocale($locale);
        Carbon::setLocale($locale);

        return $locale;
    }







}
