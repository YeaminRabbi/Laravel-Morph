<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
use App\Models\Video;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }

    function videos(){
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
