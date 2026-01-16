@extends('layouts.app')

@section('content')
    <h1>タスク詳細</h1>

    <p>ID: {{ $task->id }}</p>
    <p>タスク: {{ $task->content }}</p>
    <p>ステータス: {{ $task->status }}</p>

    <a href="/tasks/{{ $task->id }}/edit">編集</a>

    <form action="/tasks/{{ $task->id }}" method="POST" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>

    <a href="/">一覧に戻る</a>
@endsection