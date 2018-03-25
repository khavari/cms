<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    protected $table = "comments";
    protected $guarded = ['id'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function commentable()
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        Relation::morphMap([
            'contents' => 'App\Content',
            'products' => 'App\Product',
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', null);
    }

    public function scopeApprove($query)
    {
        return $query->whereNotNull('approved_at');
    }

    public function isApprove(): bool
    {
        return $this->approved_at != null;
    }

    public function hasChildren(): bool
    {
        return $this->children()->count() > 0;
    }

    public function deleteComment()
    {
        $comments = $this->children()->get();
        foreach ($comments as $comment) {
            if ($comment->hasChildren()) {
                $comment->deleteComment();
            } else {
                $comment->delete();
            }
        }
        $this->delete();
    }

    public function restoreComment()
    {
        $comments = $this->children()->withTrashed()->get();
        foreach ($comments as $comment) {
            if ($comment->children()->withTrashed()->count() > 0) {
                $comment->restoreComment();
            } else {
                $comment->restore();
            }
        }
        $this->restore();
    }


}
