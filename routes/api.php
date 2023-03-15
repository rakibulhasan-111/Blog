<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/apiindex', [\App\Http\Controllers\BlogPostController::class, 'apiindex']);

Route::post('/apistore', [\App\Http\Controllers\BlogPostController::class, 'apistore']);

Route::get('/apishow/{id}', [\App\Http\Controllers\BlogPostController::class, 'apishow']);

Route::put('/apiupdate/{id}', [\App\Http\Controllers\BlogPostController::class, 'apiupdate']);

Route::delete('/apidestroy/{id}', [\App\Http\Controllers\BlogPostController::class, 'apidestroy']);

