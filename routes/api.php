<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\TaskController;
use App\Http\Controllers\api\ProjectController;

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


Route::post('v1/auth/register', [AuthController::class, 'register']);
Route::post('v1/auth/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('v1/auth/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('v1/projects/all', [ProjectController::class, 'index']);
    Route::post('v1/projects/create', [ProjectController::class, 'store']);
    Route::get('v1/projects/show/{id}', [ProjectController::class, 'show']);
    Route::put('v1/projects/update/{id}', [ProjectController::class, 'update']);
    Route::delete('v1/projects/delete/{id}', [ProjectController::class, 'destroy']);

      // Project-specific routes
      Route::prefix('v1/projects/details/{projectId}')->group(function () {
        Route::get('tasks', [TaskController::class, 'index']);
        Route::post('tasks', [TaskController::class, 'store']);
        Route::get('tasks/{taskId}', [TaskController::class, 'show']);
        Route::put('tasks/{taskId}', [TaskController::class, 'update']);
        Route::delete('tasks/{taskId}', [TaskController::class, 'destroy']);
        Route::get('tasks/ending-after/{date}', [TaskController::class, 'getTasksEndingAfter']);
    });
    
});