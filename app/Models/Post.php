<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Tag;
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    
    function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
