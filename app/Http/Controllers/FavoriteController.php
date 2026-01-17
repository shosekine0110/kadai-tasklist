<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class FavoriteController extends Controller
{
    public function store($id)
    {
        $task = Task::findOrFail($id);
        auth()->user()->favorites()->syncWithoutDetaching([$id]);

        return back();
    }

    public function destroy($id)
    {
        auth()->user()->favorites()->detach($id);

        return back();
    }
}
