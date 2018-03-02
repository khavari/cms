<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $guarded = ['id'];

    protected $table = 'links';

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function isActive()
    {
        if ($this->active === 1) {
            return true;
        }

        return false;
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function scopeLang($query)
    {
        $lang = app()->getLocale();

        return $query->whereLang($lang);
    }


    public function hasChildren()
    {
        if ($this->children->count()) {
            return true;
        }

        return false;
    }

    public function isExternal()
    {
        if($this->url == null){
            $full_url = url('/');
        }else{
            $full_url = (string) url($this->url);
        }
        if (! str_contains($full_url, env('APP_URL'))) {
            return true;
        }else{
            return false;
        }

    }

    public function url()
    {
        if($this->url == null){
            return '/';
        }else{
            return $this->url;
        }
    }


    public function image()
    {
        return 'media/' . $this->image;
    }

    // used in footer
    public function icon()
    {
        if (isset($this->icon)) {
            return $this->icon;
        }
        if (locale('dir') == 'rtl') {
            return 'fa-angle-left';
        } else {
            return 'fa-angle-right';
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Link $link) {
            $link->lang = app()->getLocale();
            cache()->forget('navbar:' . app()->getLocale());
            cache()->forget('slider:' . app()->getLocale());
            cache()->forget('gallery:' . app()->getLocale());
            cache()->forget('customers:' . app()->getLocale());
            cache()->forget('footer:' . app()->getLocale());
            cache()->forget('parallax:' . app()->getLocale());
            cache()->forget('faq:' . app()->getLocale());
        });

        static::deleting(function () {
            cache()->forget('navbar:' . app()->getLocale());
            cache()->forget('slider:' . app()->getLocale());
            cache()->forget('gallery:' . app()->getLocale());
            cache()->forget('customers:' . app()->getLocale());
            cache()->forget('footer:' . app()->getLocale());
            cache()->forget('parallax:' . app()->getLocale());
            cache()->forget('faq:' . app()->getLocale());
        });

        static::updating(function () {
            cache()->forget('navbar:' . app()->getLocale());
            cache()->forget('slider:' . app()->getLocale());
            cache()->forget('gallery:' . app()->getLocale());
            cache()->forget('customers:' . app()->getLocale());
            cache()->forget('footer:' . app()->getLocale());
            cache()->forget('parallax:' . app()->getLocale());
            cache()->forget('faq:' . app()->getLocale());
        });
    }

}
