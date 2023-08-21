<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
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

Route::post('fibonacci', [TestController::class, 'fibonacci'])->name('fibonacci');
Route::post('factorial', [TestController::class, 'factorial'])->name('factorial');
Route::post('palindrome', [TestController::class, 'palindrome'])->name('palindrome');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::apiResource("init", InitController::class)->only(["index"]);
Route::group(["middleware" => "auth:api", "verified"], function () {
    Route::post("logout", [AuthController::class, "logout"])->name("auth.logout");
    Route::get("profile", [AuthController::class, "user"])->name("auth.user");
    Route::post("refresh", [AuthController::class, "refresh"])->name("auth.refresh");
});
