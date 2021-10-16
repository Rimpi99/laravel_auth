<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view("login");
});
Route::post("/login", [authController::class, "login"])->name("loginPage");

Route::get('/register', function () {
    return view("register");
});
Route::post("/register", [authController::class, "register"])->name("registerPage");



Route::get('/', [authController::class, "dashboard"]);

Route::get("/logout", [authController::class, "logout"]);
