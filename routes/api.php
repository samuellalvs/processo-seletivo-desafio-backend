<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/user/signOut', [UserController::class, 'signOut']);
    Route::get('/user/data', [UserController::class, 'getUserData']);
    
    Route::post('/transfer', [TransferController::class, 'doTransfer']);
});

Route::prefix('/user')->group(function(){
    Route::post('/signIn', [UserController::class, 'signIn']);
    Route::post('/create', [UserController::class, 'createUser']);
});


