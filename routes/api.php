<?php

use App\Http\Controllers\Api\publicApi\V1\BlogController;
use App\Http\Controllers\Api\publicApi\V1\HomeController;
use App\Http\Controllers\Api\publicApi\V1\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::get('categories', [HomeController::class, 'categories']);
    Route::get('featureTours', [HomeController::class, 'featureTours']);
    Route::get('destinations', [HomeController::class, 'destinations']);
    Route::get('tour/{tourId}', [TourController::class, 'singleTour']);
    Route::get('blogs', [BlogController::class, 'blogs']);
    Route::get('blog/{blogId}', [BlogController::class, 'singleBlog']);
});
