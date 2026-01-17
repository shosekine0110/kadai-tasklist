<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/favorites', [UserController::class, 'favorites'])->name('users.favorites'); // ★ 追加

Route::post('/tasks/{id}/favorite', [FavoriteController::class, 'store'])->name('favorite.store');
Route::delete('/tasks/{id}/favorite', [FavoriteController::class, 'destroy'])->name('favorite.destroy');

// 認証が必要なルート
Route::middleware('auth')->group(function () {

    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

    Route::resource('tasks', TaskController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
