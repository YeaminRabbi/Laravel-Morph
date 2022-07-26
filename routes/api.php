<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('users', [ApiController::class,'userlist']);
Route::get('images', [ApiController::class,'imagelist']);
Route::get('posts', [ApiController::class,'postlist']);
Route::get('videos', [ApiController::class,'videolist']);
Route::get('comments', [ApiController::class,'commentlist']);
Route::get('tags', [ApiController::class,'taglist']);


Route::get('books', [ApiController::class, 'booklist']);

Route::get('populate', [ApiController::class,'populate']);

//With Resources
Route::get('r/posts', [ApiController::class,'postlist_r']);
Route::get('r/images', [ApiController::class,'imagelist_r']);
