<?php

use App\Http\Controllers\GamesTypeController;
use App\Http\Controllers\GroundController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('registration', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

/**
 * users
 */
Route::get('users', [UserController::class, 'get']);
Route::patch('users', [UserController::class, 'update']);

/**
 * Location
 */
Route::get('locations', [LocationController::class, 'get']);
Route::post('locations', [LocationController::class, 'create']);
Route::patch('locations', [LocationController::class, 'update']);
Route::delete('locations', [LocationController::class, 'delete']);


/**
 * game type
 */
Route::get('games-type', [GamesTypeController::class, 'get']);
Route::post('games-type', [GamesTypeController::class, 'create']);
Route::patch('games-type', [GamesTypeController::class, 'update']);
Route::delete('games-type', [GamesTypeController::class, 'delete']);

/**
 * grounds
 */
Route::get('grounds', [GroundController::class, 'get']);
Route::post('grounds', [GroundController::class, 'create']);
Route::post('ground-update', [GroundController::class, 'update']);
Route::delete('grounds', [GroundController::class, 'delete']);
