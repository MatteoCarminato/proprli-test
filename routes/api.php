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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('constructions', ConstructionController::class);

Route::post('tasks', [TaskController::class, 'store']);
Route::get('buildings/{building}/tasks', [TaskController::class, 'index']);
Route::get('tasks/{task}/comments', [TaskController::class, 'comments']);
Route::post('tasks/{task}/comments', [CommentController::class, 'store']);

Route::get('tasks', [TaskController::class, 'index']);
