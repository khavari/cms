<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    protected $table = 'product_categories';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
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
        return app()->getLocale().'/products/'.$this->slug;
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function (ProductCategory $productCategory) {
            $productCategory->lang = app()->getLocale();
        });
    }
}
