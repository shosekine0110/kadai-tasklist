@extends('layouts.app')

@section('content')
    <h1>タスク編集</h1>

    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>タスク</label>
            <input type="text" name="content" value="{{ old('content', $task->content) }}">
        </div>

        <div>
            <label>ステータス</label>
            <input type="text" name="status" value="{{ old('status', $task->status) }}">
        </div>

        <button type="submit">更新</button>
    </form>
@endsection