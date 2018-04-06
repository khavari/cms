<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    protected $table = 'products';
    protected $dates = ['created_at', 'updated_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug',
            ],
        ];
    }

    public function product_categories()
    {
        return $this->belongsTo(ProductCategories::class);
    }



    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function url()
    {
        return url(app()->getLocale() . '/product/' . $this->slug);
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

    public function existImage()
    {
        if (file_exists($this->image)) {
            return true;
        } else {
            return false;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }


    protected static function boot()
    {
        parent::boot();
        static::creating(function (Product $product) {
            $product->lang = app()->getLocale();
        });
    }
}
