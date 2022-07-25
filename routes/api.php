<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::get('populate', [ApiController::class,'populate']);