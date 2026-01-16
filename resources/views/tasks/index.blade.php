<h1>タスク一覧</h1>

<a href="{{ route('tasks.create') }}">新規タスク作成</a>

<ul>
    @foreach ($tasks as $task)
        <li>
            {{ $task->content }}
            <a href="{{ route('tasks.show', $task->id) }}">詳細</a>
            <a href="{{ route('tasks.edit', $task->id) }}">編集</a>

            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button>
            </form>
        </li>
    @endforeach
</ul>