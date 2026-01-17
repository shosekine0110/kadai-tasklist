<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();   // ★ IDE が型を理解しやすい

        $tasks = $user->tasks()
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

        $user = auth()->user();   // ★ ここも変数にする

        $user->tasks()->create([
            'content' => $validated['content'],
            'status' => $validated['status'],
        ]);

        return redirect('/');
    }

    public function show(Task $task)
    {
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
