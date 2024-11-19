<?php

use App\Http\Controllers\GamesTypeController;
use App\Http\Controllers\GroundController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessageController;
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
Route::get('users/{id}', [UserController::class, 'show']);
Route::patch('users', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'delete']);

/**
 * Location
 */
Route::get('locations', [LocationController::class, 'get']);
Route::post('locations', [LocationController::class, 'create']);
Route::get('locations/{id}', [LocationController::class, 'show']);
Route::patch('locations', [LocationController::class, 'update']);
Route::delete('locations/{id}', [LocationController::class, 'delete']);


/**
 * game type
 */
Route::get('games-type', [GamesTypeController::class, 'get']);
Route::get('games-type/{id}', [GamesTypeController::class, 'show']);
Route::post('games-type', [GamesTypeController::class, 'create']);
Route::patch('games-type', [GamesTypeController::class, 'update']);
Route::delete('games-type/{id}', [GamesTypeController::class, 'delete']);

/**
 * grounds
 */
Route::get('grounds', [GroundController::class, 'get']);
Route::get('grounds/{id}', [GroundController::class, 'show']);
Route::post('grounds', [GroundController::class, 'create']);
Route::post('ground-update', [GroundController::class, 'update']);
Route::delete('grounds/{id}', [GroundController::class, 'delete']);

/**
 * messages
 */
Route::get('message', [MessageController::class, 'get']);
Route::get('message/{id}', [MessageController::class, 'show']);
Route::post('message', [MessageController::class, 'create']);

/**
 * availability
 */
Route::post('availability', [GroundController::class, 'availability']);
