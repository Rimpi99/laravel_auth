<?php

use App\Http\Controllers\taskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get("/todos", [taskController::class, "get_all_task"]);
Route::post("/todos/add", [taskController::class, "add_task"]);
Route::post("/todos/status", [taskController::class, "update_status"]);
