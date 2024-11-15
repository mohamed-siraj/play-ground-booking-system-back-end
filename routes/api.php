<?php

use App\Http\Controllers\GamesTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
 * Location
 */
Route::post('locations', [LocationController::class, 'create']);
Route::patch('locations', [LocationController::class, 'update']);
Route::delete('locations', [LocationController::class, 'delete']);

Route::post('games-type', [GamesTypeController::class, 'create']);
Route::patch('games-type', [GamesTypeController::class, 'update']);
Route::delete('games-type', [GamesTypeController::class, 'delete']);
