<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

// 認証が必要なルート
Route::middleware('auth')->group(function () {

    // トップページ = タスク一覧
    Route::get('/', [TaskController::class, 'index'])
        ->name('tasks.index');

    // Task の CRUD（index も含めて OK）
    Route::resource('tasks', TaskController::class);

    // プロフィール（Breeze 標準）
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Breeze の認証ルート
require __DIR__.'/auth.php';
