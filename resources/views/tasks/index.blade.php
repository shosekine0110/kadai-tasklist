@extends('layouts.app')

@section('content')
    <h1>タスク一覧</h1>

    <a href="/tasks/create">新規作成</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>タスク</th>
            <th>ステータス</th>
            <th>詳細</th>
        </tr>

        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->content }}</td>
                <td>{{ $task->status }}</td>
                <td><a href="/tasks/{{ $task->id }}">表示</a></td>
            </tr>
        @endforeach
    </table>
@endsection