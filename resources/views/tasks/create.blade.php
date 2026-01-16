<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            タスク新規作成
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">内容</label>
                        <input type="text" name="content"
                               class="border rounded w-full mt-1 p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">ステータス</label>
                        <input type="text" name="status"
                               class="border rounded w-full mt-1 p-2"
                               required>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            作成
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
