<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Define the API version in the route group
Route::prefix('v1')->group(function () {
    // Use apiResource to automatically generate the standard RESTful routes
    Route::apiResource('posts', PostController::class);
});
