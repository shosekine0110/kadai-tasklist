@extends('layouts.app')

@section('content')
    <h1>タスク新規作成</h1>

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

    <form action="/tasks" method="POST">
        @csrf

        <div>
            <label>タスク</label>
            <input type="text" name="content" value="{{ old('content') }}">
        </div>

        <div>
            <label>ステータス</label>
            <input type="text" name="status" value="{{ old('status') }}">
        </div>

        <button type="submit">作成</button>
    </form>
@endsection