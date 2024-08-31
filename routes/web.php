<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->middleware('auth');
Route::get('/me', [TaskController::class, 'getUserTasks'])->middleware('auth');
Route::get('/categories/{category?}', [TaskController::class, 'index'])->middleware('auth');

Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->middleware('auth');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
