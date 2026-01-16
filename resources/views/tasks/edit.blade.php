<h1>タスク編集</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="content" value="{{ $task->content }}">
    <button type="submit">更新</button>
</form>

<a href="/">戻る</a>