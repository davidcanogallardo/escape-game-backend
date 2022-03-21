<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\RankingController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('/user/listrequests', [UserController::class, 'listRequests'])->middleware('auth:sanctum', 'cors');
Route::put('/user/handlerequest/{friend}/{response}', [UserController::class, 'handleRequest'])->middleware('auth:sanctum');
Route::put('/user/update/photo', [UserController::class, 'updatePhoto'])->middleware('auth:sanctum');
Route::post('friendlist', [UserController::class, 'friendList'])->middleware('auth:sanctum');
Route::put('/user/sendrequest', [UserController::class, 'sendRequest'])->middleware('auth:sanctum');
Route::post('/user/addgame/{level}/{time}', [UserController::class, 'addGame'])->middleware('auth:sanctum');
Route::post('/ranking', [RankingController::class, 'getRanking']);
Route::get('/user/userinfo/{id}', [UserController::class, 'getUserInfo'])->middleware('auth:sanctum');
