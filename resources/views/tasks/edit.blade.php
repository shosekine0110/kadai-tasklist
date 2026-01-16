<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            タスク編集
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                {{-- エラーメッセージ --}}
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">タスク</label>
                        <input type="text" name="content"
                               value="{{ old('content', $task->content) }}"
                               class="border rounded w-full mt-1 p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">ステータス</label>
                        <input type="text" name="status"
                               value="{{ old('status', $task->status) }}"
                               class="border rounded w-full mt-1 p-2"
                               required>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            更新
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>