<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $user->name }} さんのページ
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- ★★★ ここにタブを追加する ★★★ -->
            <div class="flex space-x-6 border-b mb-6">
                <a href="{{ route('users.show', $user->id) }}"
                   class="pb-2 {{ request()->routeIs('users.show') ? 'border-b-2 border-blue-600 font-semibold' : '' }}">
                    タスク一覧
                </a>

                <a href="{{ route('users.favorites', $user->id) }}"
                   class="pb-2 {{ request()->routeIs('users.favorites') ? 'border-b-2 border-blue-600 font-semibold' : '' }}">
                    お気に入り
                </a>
            </div>
            <!-- ★★★ ここまでタブ ★★★ -->

            <!-- ここからタスク一覧 -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">タスク一覧</h3>

                @foreach ($tasks as $task)
                    <div class="border-b py-3">
                        <p class="font-semibold">{{ $task->content }}</p>
                        <p class="text-gray-600 text-sm">ステータス: {{ $task->status }}</p>
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
