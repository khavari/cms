<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = ['id'];

    protected $table = 'features';

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function scopeSlug($query, $slug)
    {
        $lang = app()->getLocale();
        return $query->where('slug', '=', $slug)->whereLang($lang);
    }

    public static function getId($slug)
    {
        $lang = app()->getLocale();
        return Feature::whereLang($lang)->where('slug', '=', $slug)->first()->id;
    }


    //================================

    public function navbar()
    {
        return cache()->rememberForever('navbar:' . app()->getLocale(), function () {
            return $this->slug('navbar')->first()->links()->lang()->parents()->orderBy('order')->get();
        });

    }

    public function slider()
    {
        return cache()->rememberForever('slider:' . app()->getLocale(), function () {
            return $this->slug('slider')->first()->links()->lang()->active()->orderBy('order')->get();
        });
    }

    public function gallery()
    {
        return cache()->rememberForever('gallery:' . app()->getLocale(), function () {
            return $this->slug('gallery')->first()->links()->lang()->active()->orderBy('order')->get();
        });
    }

    public function customers()
    {
        return cache()->rememberForever('customers:' . app()->getLocale(), function () {
            return $this->slug('customers')->first()->links()->lang()->active()->orderBy('order')->get();
        });
    }

    public function footer()
    {
        return cache()->rememberForever('footer:' . app()->getLocale(), function () {
            return $this->slug('footer')->first()->links()->lang()->active()->orderBy('order')->get();
        });
    }

    public function parallax()
    {
        return cache()->rememberForever('parallax:' . app()->getLocale(), function () {
            return $this->slug('parallax')->first()->links()->lang()->active()->orderBy('order')->get();
        });
    }

    public function faq()
    {
        return cache()->rememberForever('faq:' . app()->getLocale(), function () {
            return $this->slug('faq')->first()->links()->lang()->active()->orderBy('order')->get();
        });
    }
}
