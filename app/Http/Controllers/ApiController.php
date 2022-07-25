<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;
use App\Models\Image;
use App\Models\Comment;


use Faker\Generator;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
class ApiController extends Controller
{
    function userlist()
    {
        $collection = User::query()->with("image")->get();
        return response([
            'data' => $collection 
        ]);
    }
   

    function imagelist()
    {
     
        $collection = Image::query()
        ->where("imageable_type", Post::class)
        ->with("imageable")
        ->get();
 
       
        return response([
            'data' => $collection 
        ]);
    }

    function postlist()
    {
        $collection = Post::query()->with("image")->get();
        return response([
            'data' => $collection 
        ]);
    }
    function populate()
    {
        $limit = 10;
        $faker = Faker::create();
        // for($i=1; $i<=$limit;$i++)
        // {
        //     $post = new Post;
        //     $post->body = Str::random(50);
        //     $post->save();
    
        //     $post->image()->create(['url'=>'site/image.png']);
        // }

       
        // for($i=1; $i<=$limit;$i++)
        // {
        //    $user = new User;
        //    $user->name = $faker->name;
        //    $user->email = $faker->email;
        //    $user->password = Str::random(20);
        //    $user->save();

        //    $user->image()->create(['url' => 'site/user-image/'.Str::random(5)]);
           
        // }

       

        return response([
            'msg'=>"Successfully Uploaded"
        ]);
    }
}