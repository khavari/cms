<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    protected $table = 'categories';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

    public function vocabulary()
    {
        return $this->belongsTo(Vocabulary::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function scopeLang($query)
    {
        $lang = app()->getLocale();

        return $query->whereLang($lang);
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

    public function url()
    {
        return app()->getLocale().'/category/'.$this->slug;
    }


    protected static function boot()
    {
        parent::boot();
        static::creating(function (Category $category) {
            $category->lang = app()->getLocale();
        });
    }











}
