<?php

use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
//ressources routes
Route::resource('projets', ProjetController::class)->only(['index', 'show', 'store','destroy']);
Route::resource('taks', TaskController::class)->only(['index', 'show', 'store','destroy']);
Route::resource('users', UserController::class)->only(['index', 'show', 'store','destroy']);
