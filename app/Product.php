<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
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

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function price()
    {
        return $this->price;
    }

    public function discount()
    {
        if($this->price === 0){
            return 0;
        }

        if($this->price <= $this->old_price){
            $percent =  100 - (($this->price * 100) / $this->old_price);
            return $this->old_price - $this->price;
        }

        return 0;
    }

    public function scopeLang($query)
    {
        $lang = app()->getLocale();

        return $query->whereLang($lang);
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '1');
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

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Product $product) {
            $product->lang = app()->getLocale();
            cache()->forget('featured_products:' . app()->getLocale());
        });

        static::deleting(function () {
            cache()->forget('featured_products:' . app()->getLocale());
        });

        static::updating(function () {
            cache()->forget('featured_products:' . app()->getLocale());
        });
    }

    // service
    public function featured_products()
    {
        return cache()->rememberForever('featured_products:' . app()->getLocale(), function () {
            return $this->lang()->active()->featured()->latest()->get();
        });
    }

}
