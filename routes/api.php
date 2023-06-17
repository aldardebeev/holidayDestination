<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/create-user', [UserController::class, 'createUser']);

Route::group([
    'middleware' => 'jwt.auth',], function ($router) {
    Route::get('/get-destinations', [DestinationController::class, 'getDestinations']);
    Route::post('/add-Destination', [UserController::class, 'addDestination']);
    Route::get('/getFavorites', [UserController::class, 'getFavorites']);
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
