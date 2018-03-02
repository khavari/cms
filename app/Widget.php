<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $guarded = ['id'];

    protected $table = 'widgets';

    public function scopeLang($query)
    {
        $lang = app()->getLocale();

        return $query->whereLang($lang);
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function scopeGroup($query, $type)
    {
        return $query->where('group', $type);
    }

    public function isActive()
    {
        if ($this->active === 1) {
            return true;
        }
        return false;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Widget $widget) {
            cache()->forget('widgets:' . app()->getLocale());
        });

        static::deleting(function () {
            cache()->forget('widgets:' . app()->getLocale());
        });

        static::updating(function () {
            cache()->forget('widgets:' . app()->getLocale());
        });
    }

}
