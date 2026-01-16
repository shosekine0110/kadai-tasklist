<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            タスク詳細
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="mb-4">
                    <p class="text-gray-700"><span class="font-semibold">ID:</span> {{ $task->id }}</p>
                    <p class="text-gray-700"><span class="font-semibold">タスク:</span> {{ $task->content }}</p>
                    <p class="text-gray-700"><span class="font-semibold">ステータス:</span> {{ $task->status }}</p>
                </div>

                <div class="flex gap-4 mt-6">

                    {{-- 編集 --}}
                    <a href="{{ route('tasks.edit', $task->id) }}"
                       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        編集
                    </a>

                    {{-- 削除 --}}
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                onclick="return confirm('削除しますか？')">
                            削除
                        </button>
                    </form>

                    {{-- 一覧に戻る --}}
                    <a href="{{ route('tasks.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        一覧に戻る
                    </a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>