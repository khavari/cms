<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Content extends Model
{

    use Sluggable;
    protected $guarded = ['id'];

    protected $table = 'contents';
    protected $dates = ['created_at', 'updated_at', 'published_at'];

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
        return $this->belongsTo(Category::class);
    }

    public function vocabulary()
    {
        return $this->belongsTo(Vocabulary::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function url($id = null)
    {
        if(is_null($id)){
            return url(app()->getLocale() . '/content/' . $this->slug);
        }else{
            return url(app()->getLocale() . '/c/' . $this->id);
        }

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

    public function scopePublished($query)
    {
        $now = Carbon::now();

        return $query->where('published_at', '<=', $now);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '1');
    }

    public function thumbnail()
    {
        $options = (array) json_decode($this->category->options);
        if(isset($options['dimension'])){
            return 'media/'.$this->image.$options['dimension'];
        }else{
            return $this->image;
        }

    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Content $content) {
            $content->lang = app()->getLocale();
        });
    }

}
