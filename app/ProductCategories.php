<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
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
        return $this->hasMany(Product::class);
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
        return app()->getLocale().'/pc/'.$this->slug;
    }


    protected static function boot()
    {
        parent::boot();
        static::creating(function (ProductCategories $productCategories) {
            $productCategories->lang = app()->getLocale();
        });
    }
}
