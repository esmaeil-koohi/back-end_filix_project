<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\MovieController;
use App\Http\Controllers\Api\V1\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('v1/register',[AuthController::class,'register']);
Route::post('v1/login',[AuthController::class,'login']);

Route::middleware('auth:api')->put('v1/update-user-profile',[UserController::class,'update']);
Route::middleware('auth:api')->get('v1/get-my-profile',[UserController::class,'getMyProfile']);
Route::middleware('auth:api')->get('v1/get-user-profile/{id}',[UserController::class,'getUserProfile']);

Route::middleware('auth:api')->post('v1/create-new',[MovieController::class,'createNew']);
Route::middleware('auth:api')->get('v1/home-list',[MovieController::class,'homeList']);
Route::middleware('auth:api')->get('v1/get-movie-by-genre/{genre_id}',[MovieController::class,'getByGenre']);
Route::middleware('auth:api')->get('v1/get-movie-by-country/{country_id}',[MovieController::class,'getByCountry']);
Route::middleware('auth:api')->get('v1/movie-details/{movie_id}',[MovieController::class,'movieDetails']);
Route::middleware('auth:api')->get('v1/movie-get-se/{item_id}',[MovieController::class,'moviegetSe']);
Route::middleware('auth:api')->post('v1/create-new-comment',[CommentController::class,'createNewComment']);
