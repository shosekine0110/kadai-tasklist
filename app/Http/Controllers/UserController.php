<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ★ ユーザー詳細ページ（タスク一覧）
    public function show($id)
    {
        $user = User::findOrFail($id);
        $tasks = $user->tasks()->latest()->paginate(10);

        return view('users.show', compact('user', 'tasks'));
    }

    // ★ お気に入り一覧ページ
    public function favorites($id)
    {
        $user = User::findOrFail($id);
        $tasks = $user->favorites()->latest()->paginate(10);

        return view('users.favorites', compact('user', 'tasks'));
    }
}
