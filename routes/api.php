<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']); // Получение списка пользователей
Route::get('/users/{id}', [UserController::class, 'show']); // Получение информации о пользователе по ID
Route::post('/users', [UserController::class, 'store']); // Добавление нового пользователя

Route::get('/positions', [PositionController::class, 'index']); // Получение списка позиций
