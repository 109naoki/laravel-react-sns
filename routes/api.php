<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
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



Route::post('login', [
        App\Http\Controllers\api\Auth\LoginController::class,
        'login',
]);
Route::post('register', [
        App\Http\Controllers\api\Auth\LoginController::class,
        'register',
]);
Route::post('logout', [
        App\Http\Controllers\api\Auth\LoginController::class,
        'logout',
]);



Route::group(['middleware' => 'auth:sanctum'],function(){
Route::apiResource('posts','App\Http\Controllers\PostController');


Route::get('/user/authentication', [
        App\Http\Controllers\UserController::class,
        'authentication',
]);

Route::get('/user/{user}', [
        App\Http\Controllers\UserController::class,
        'show',
]);

Route::post('/user/update/{user}', [
        App\Http\Controllers\UserController::class,
        'update',
]);

Route::get('/favorites',[App\Http\Controllers\FavoriteController::class, 'index']);
Route::post('/{id}/favorite',[App\Http\Controllers\FavoriteController::class, 'store']);
Route::post('/{id}/unfavorite',[App\Http\Controllers\FavoriteController::class, 'destroy']);
Route::post('/users/{user}/follow',[App\Http\Controllers\FollowUserController::class, 'follow']);
Route::post('/users/{user}/unfollow',[App\Http\Controllers\FollowUserController::class, 'unfollow']);


Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});
});
