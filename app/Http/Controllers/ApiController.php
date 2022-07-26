<?php

namespace App\Http\Controllers;
use App\Http\Resources\ImageResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\RatingResource;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Book;
use App\Models\Rating;


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
        $collection = Post::query()->with('image','comments','tags')->get();
        return response([
            'data' => $collection 
        ]);
    }

    function postlist_r()
    {
        return PostResource::collection(Post::all());
    }

    function imagelist_r()
    {
        return ImageResource::collection(Image::all());

    }

    function videolist()
    {
        $collection = Video::query()->with('comments','tags')->get();
        return response([
            'data' => $collection 
        ]);
    }

    function commentlist()
    {
        $collection = Comment::query()->with('commentable')->get();
        return response([
            'data' => $collection 
        ]);
    }

    function taglist()
    {
        $collection = Tag::get();
        return response([
            'data' => $collection 
        ]);
    }


    function booklist()
    {
        $id = 10;
        //return new BookResource(Book::find($id));
        return BookResource::collection(Book::all());
    }

    function populate()
    {
        $limit = 20;
        $faker = Faker::create();
        // for($i=1; $i<=$limit;$i++)
        // {
        //     $post = new Post;
        //     $post->body = Str::random(50);
        //     $post->save();
    
        //     $post->image()->create(['url'=>'site/'.Str::random(5)]);
        //     $post->comments()->create(['body'=>Str::random(50)]);
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


        // for($i=1; $i<=$limit;$i++)
        // {
        //     $video = new Video;
        //     $video->url = 'site/videos/'.Str::random(50);
        //     $video->save();
    
         
        //     $video->comments()->create(['body'=>Str::random(50)]);
        // }

        
        // for($i=1; $i<=$limit;$i++)
        // {
        //    $post = Post::all()->random();
        //    $post->tags()->create(['name'=>Str::random(7)]);

        //    $videos = Video::all()->random();
        //    $videos->tags()->create(['name'=>Str::random(7)]);

        // }

        for($i=1; $i<=$limit;$i++)
        {
          $book = new Book;
          $book->title = $faker->name;
          $book->user_id = User::all()->random()->id;
          $book->description = Str::random(50);
          $book->save();

          $rating = new Rating;
          $rating->rating = rand(1,5);
          $rating->book_id = 10;
          $rating->user_id = User::all()->random()->id;
          $rating->save();
        }
       

        return response([
            'msg'=>"Successfully Uploaded"
        ]);
    }
}
