<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ auth()->user()->name }} さんのタスク一覧
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">タスク一覧</h3>

                    <a href="{{ route('tasks.create') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        新規作成
                    </a>
                </div>

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="p-2 text-left">ID</th>
                            <th class="p-2 text-left">タスク</th>
                            <th class="p-2 text-left">ステータス</th>
                            <th class="p-2 text-left">詳細</th>
                            <th class="p-2 text-left">編集</th>
                            <th class="p-2 text-left">削除</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border-b">
                                <td class="p-2">{{ $task->id }}</td>
                                <td class="p-2">{{ $task->content }}</td>
                                <td class="p-2">{{ $task->status }}</td>

                                <td class="p-2">
                                    <a href="{{ route('tasks.show', $task->id) }}"
                                       class="text-blue-600 hover:underline">
                                        表示
                                    </a>
                                </td>

                                <td class="p-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                       class="text-green-600 hover:underline">
                                        編集
                                    </a>
                                </td>

                                <td class="p-2">
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:underline"
                                            onclick="return confirm('削除しますか？')">
                                            削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>