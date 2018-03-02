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

}
