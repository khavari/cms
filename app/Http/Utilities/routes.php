<?php
function is_current_route($route)
{
    $current_route = Route::current()->getName();
    if (strpos($current_route, $route) !== false) {
        return true;
    }

}

function byte_convert($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 0) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 0) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 0) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }
    return $bytes;
}



/**
 * @param string $key
 * @param string $default
 *
 * @return string
 */
if (!function_exists('setting')) {
    function setting($key = null, $field = 'value')
    {
        $setting = app()->make(\App\Setting::class);
        if (func_num_args() === 1) {

            // check the config file in config directory
            if (!is_null(config($key))) {
                return config($key);
            }

            // check the .env file.
            if (!is_null(env($key))) {
                return env($key);
            }

            // return the value from settings model
            return $setting->get($key, $field);
        }

        if (func_num_args() === 2) {
            return $setting->get($key, $field);
        }
        return 'Undefined key';
    }
}
