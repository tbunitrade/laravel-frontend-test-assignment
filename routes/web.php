<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

//Route::post('/upload-image', [ImageController::class, 'upload']);
//Route::post('/upload-image', [ImageController::class, 'upload'])->middleware('web');
Route::post('/upload-image', [ImageController::class, 'upload'])->middleware(['web', 'auth.token']);

Route::get('/upload-form', function () {
    return view('upload');
});





