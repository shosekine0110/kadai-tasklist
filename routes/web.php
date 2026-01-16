<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// 認証なしで tasks を使う
Route::resource('tasks', TaskController::class);

// require __DIR__.'/auth.php'; ← Breeze を使わないので不要