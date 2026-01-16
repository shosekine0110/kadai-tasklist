<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        // 全アクションをログインユーザー専用にする
        $this->middleware('auth');
    }

    public function index()
    {
        // ログインユーザーのタスクだけ取得
        $tasks = auth()->user()
            ->tasks()
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10',
        ]);

        // ログインユーザーに紐づけてタスク作成
        auth()->user()->tasks()->create([
            'content' => $validated['content'],
            'status' => $validated['status'],
        ]);

        return redirect('/');
    }

    public function show(Task $task)
    {
        // 他人のタスクは見れない
        if ($task->user_id !== auth()->id()) {
            return redirect('/');
        }

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect('/');
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect('/');
        }

        $validated = $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10',
        ]);

        $task->update($validated);

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect('/');
        }

        $task->delete();

        return redirect('/');
    }
}