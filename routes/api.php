<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Csrf;
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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// User
Route::get('/user/notification-list', [UserController::class, 'getNotificationList'])->middleware('auth:sanctum', 'cors');
Route::get('/user/friend-list', [UserController::class, 'getFriendList'])->middleware('auth:sanctum');
Route::get('/user/userinfo/{id}', [UserController::class, 'getUserInfo'])->middleware('auth:sanctum');
Route::get('/user/history/{name}', [UserController::class, 'getGameHistory']);
Route::put('/user/friend-request', [UserController::class, 'sendFriendRequest'])->middleware('auth:sanctum');
Route::put('/user/handle-request/{friend}/{response}', [UserController::class, 'handleFriendRequest'])->middleware('auth:sanctum');
Route::put('/user/update/photo', [UserController::class, 'updatePhoto'])->middleware('auth:sanctum');
Route::put('/user/game/{level}/{time}', [UserController::class, 'addGame'])->middleware('auth:sanctum');

// Game
Route::get('/game/ranking', [RankingController::class, 'getRanking']);
Route::get('/game/random-map/{difficulty}', [GameController::class, 'getRandomMap']);
Route::get('/getScore/{time}/{nChallanges}', [UserController::class, 'calcPoints']);