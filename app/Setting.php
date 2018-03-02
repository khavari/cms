<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];

    protected $table = 'settings';


    public function scopeLang($query)
    {
        $lang = app()->getLocale();

        return $query->whereLang($lang);
    }


    public function get($key, $field)
    {
        // fix check cache
        $settings = cache()->rememberForever('settings:' . app()->getLocale(), function () {
            return Setting::whereLang(app()->getLocale())->get();
        });

        if ($settings->where('key', $key)->count() === 1) {
            return $settings->where('key', $key)->first()->$field;
        }else{
            return "Undefined '" . $key . "' key in settings";
        }
    }


    protected static function boot()
    {
        parent::boot();
        static::updating(function () {
            cache()->forget('settings:' . app()->getLocale());
        });
    }

}
