<h1>タスク新規作成</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input type="text" name="content" placeholder="タスク内容">
    <button type="submit">登録</button>
</form>

<a href="/">戻る</a>