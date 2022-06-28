<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\WilayahController;

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

// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('me', 'me');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');

// // });
Route::get('/wilayah', [WilayahController::class,'provinsi']);
Route::post('/province/city', [WilayahController::class,'kota']);


Route::post('/send', [EmailController::class,'index']);

// Route::get('/login/google', [GoogleController::class, 'index']);
// Route::get('/login/google/callback', [App\Http\Controllers\GoogleController::class, 'callback']);
// Route::get('/login/facebook', [App\Http\Controllers\GoogleController::class, 'indexfb']);
// Route::get('/login/facebook/callback', [App\Http\Controllers\GoogleController::class, 'callbackfb']);
// Route::get('/login/linkedin', [App\Http\Controllers\GoogleController::class, 'indexlinkedin']);
// Route::get('/login/linkedin/callback', [App\Http\Controllers\GoogleController::class, 'callbacklinkedin']);


Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    // Route::get('/aa', [AuthController::class,'kota']);
});

