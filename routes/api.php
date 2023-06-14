<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'jwt.auth',], function ($router) {
    Route::get('/destinations', [DestinationController::class, 'list']);
    Route::post('/add_favorite', [UserController::class, 'store']);
    Route::post('/create_user', [UserController::class, 'post']);
    Route::get('/favorite/{id}', [UserController::class, 'get']);
});






Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh',  [AuthController::class, 'refresh']);
    Route::post('me',  [AuthController::class, 'me']);
});
