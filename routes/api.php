<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ConstructionController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\CommentController;


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

Route::get('/', function () {
    return response()->json(['message' => 'live'], 200);
});

Route::apiResource('constructions', ConstructionController::class)->only(['index','store']);
Route::apiResource('tasks', TaskController::class)->only(['index', 'store']);

Route::get('tasks/{task}/comments', [TaskController::class, 'comments']);
Route::post('tasks/{task}/comments', [CommentController::class, 'store']);