<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cookie;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get approved locales from config
        $locales = locale('keys');
        $lang = (string) request()->segment('1');

        if (in_array($lang , $locales)) {
            $locale = $lang;
        }else{
            $locale = config('app.fallback_locale');
        }

        if (count(request()->segments()) === 0) {
            return redirect($locale);
        }

        elseif (count(request()->segments()) === 1 && ! in_array($lang , $locales)) {
            $segments = $request->segments();
            array_unshift($segments, app()->getLocale());
            return redirect(implode('/', $segments));
        }

        else {
            return $next($request);
        }
    }


    protected function isAdminRoute()
    {
        $prefix = ['admin', 'administrator'];
        if (count(request()->segments()) >= 1 && in_array(request()->segment(1), $prefix)) {
            app()->setLocale(config('app.fallback_locale'));

            return true;
        }

        return false;
    }

    protected function isWebRoute()
    {
        $prefix = ['api', 'admin'];
        if (count(request()->segments()) >= 0 && ! in_array(request()->segment(1), $prefix)) {
            return true;
        }

        return false;
    }


}
