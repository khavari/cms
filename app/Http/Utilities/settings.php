<?php

/**
 * @param string $key
 * @param string $default
 *
 * @return string
 */
if (! function_exists('setting')) {
    function setting($key = null, $field = 'value')
    {
        $setting = app()->make(\App\Setting::class);
        if (func_num_args() === 1) {


//            // check the config file in config directory
//            if (! is_null(config($key))) {
//                return config($key);
//            }
//
//            // check the .env file.
//            if (! is_null(env($key))) {
//                return env($key);
//            }

            // return the value from settings model
            return $setting->get($key, $field);
        }

        if (func_num_args() === 2) {
            return $setting->get($key, $field);
        }

        return 'Undefined key';
    }
}


if (! function_exists('locale')) {
    function locale($key = null)
    {
        $lang = app()->getLocale();
        $locales = config('locales');

        if (func_num_args() === 1) {

            if (in_array($key, ['key', 'name', 'dir', 'flag', 'timezone', 'approve'])) {
                return collect($locales)->where('key', $lang)->first()[$key];
            } //----------
            elseif ($key === 'all') {
                return (object)collect($locales)->where('approve', 1);
            } //----------
            elseif ($key === 'keys') {
                return collect($locales)->where('approve', 1)->pluck('key')->toArray();
            }

        }
        if (func_num_args() === 0) {
            return app()->getLocale();

        }

    }
}

if (! function_exists('isUpdated')) {
    function isUpdated($updated_at)
    {
        $seconds = (int)env('TIME_SHIFT', 60);
        $now = \Carbon\Carbon::now()->subSecond($seconds);
        if ($updated_at > $now) {
            return true;
        }

        return false;
    }
}


if (! function_exists('date_ago')) {
    function date_ago($timestamp)
    {
        if (locale('dir') === 'rtl') {
            return jdate($timestamp)->ago();
        } else {
            return $timestamp->diffForHumans();
        }
    }
}
