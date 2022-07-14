<?php

use App\Http\Controllers\Post\GetActivityController;
use App\Http\Controllers\Post\GetPostDetailController;
use App\Http\Controllers\Post\LikePostController;
use App\Http\Controllers\Post\PostsListController;
use App\Http\Controllers\Post\UnlikePostController;
use App\Http\Controllers\User\UpdateUserDataController;
use App\Http\Controllers\User\UserAuthorizationController;
use App\Http\Controllers\User\UserLogoutController;
use App\Http\Controllers\User\UserRegistrationController;
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

Route::get('/posts', PostsListController::class);
Route::get('/posts/{id}', GetPostDetailController::class);


Route::post('/login', UserAuthorizationController::class);
Route::post('/registration', UserRegistrationController::class);
Route::post('/logout', UserLogoutController::class);

Route::middleware(['auth', 'api'])->group(function (){
    Route::get('/activity', GetActivityController::class);
    Route::put('/users/update', UpdateUserDataController::class);
    Route::post('/posts/like/{postId}', LikePostController::class);
    Route::post('/posts/unlike/{postId}', UnlikePostController::class);
});

