<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\CollapController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\MapController;
use App\Http\Controllers\Api\ShowController;
use App\Http\Controllers\Api\RecordController;

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

Route::post('logout', [AuthController::class, 'logout']);
Route::resource('contact', ContactController::class);
Route::resource('type', TypeController::class);
Route::get('showCollap', [ShowController::class, 'showCollap']);
Route::get('showPost', [ShowController::class, 'showPost']);
Route::get('showMap', [ShowController::class, 'showMap']);
Route::get('postDetail/{id}', [ShowController::class, 'postDetail']);
Route::get('mapDetail/{id}', [ShowController::class, 'mapDetail']);
Route::resource('record', RecordController::class);

Route::middleware('guest')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () { 
    Route::get('user', UserController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('member', MemberController::class);
    Route::post('uploadPicCollap', [UploadController::class, 'uploadPicCollap']);
    Route::post('uploadPicPost', [UploadController::class, 'uploadPicPost']);
    Route::post('uploadPicMap', [UploadController::class, 'uploadPicMap']);
    Route::resource('collap', CollapController::class);
    Route::resource('post', PostController::class);
    Route::resource('map', MapController::class);
    Route::get('mapAll', [MapController::class, 'mapAll']);
});
