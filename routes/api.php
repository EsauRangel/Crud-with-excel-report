<?php

use App\Http\Controllers\Api\TasksController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix("tasks", )->group(function () {
    Route::post('/', [TasksController::class, 'create']);
    Route::get('/', [TasksController::class, 'show']);
    Route::put('/{task}', [TasksController::class, 'edit']);
    Route::delete('/{task}', [TasksController::class, 'delete']);
});

