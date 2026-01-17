<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ $user->name }} さんのお気に入り一覧
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold mb-4">お気に入りタスク</h3>

                @if ($tasks->count() === 0)
                    <p class="text-gray-600">お気に入りに登録されたタスクはありません。</p>
                @endif

                @foreach ($tasks as $task)
                    <div class="border-b py-4">
                        <p class="font-semibold text-lg">{{ $task->content }}</p>
                        <p class="text-gray-600 text-sm mb-2">ステータス: {{ $task->status }}</p>

                        @if (auth()->user()->favorites->contains($task->id))
                            <form action="{{ route('favorite.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-yellow-600 hover:underline">
                                    Unfavorite
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
