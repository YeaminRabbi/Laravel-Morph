<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
