<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// ユーザー認証が必要なルート（必要であればそのまま残す）
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ToDo APIのルート設定
Route::get('/todos', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::put('/todos/{todo}', [TodoController::class, 'update']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
