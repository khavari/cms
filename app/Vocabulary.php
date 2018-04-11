<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $guarded = ['id'];

    protected $table = 'vocabularies';

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function contents()
    {
        return $this->hasManyThrough(Content::class, Category::class, 'vocabulary_id', 'category_id');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }

    public function featuredContents($slug)
    {
        $vocabulary_id = Vocabulary::where('slug',$slug)->first()->getKey();
        return Content::where('vocabulary_id', $vocabulary_id)->active()->lang()->featured()->published()->get();
    }


}
