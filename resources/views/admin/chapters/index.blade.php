<x-app-layout>
<div class="max-w-4xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6 text-center">
        Chapters for "{{ $manga->title }}"
    </h1>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.mangas.chapters.create', $manga->id) }}"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition">
           + Add Chapter
        </a>
    </div>

    <div class="space-y-4">
        @foreach($chapters as $chapter)
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Chapter {{ $chapter->chapter_number }} 
                        @if($chapter->title) - {{ $chapter->title }} @endif
                    </h3>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.mangas.chapters.edit', [$manga->id, $chapter->id]) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md transition">
                        Edit
                    </a>

                    <form action="{{ route('admin.mangas.chapters.destroy', [$manga->id, $chapter->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.mangas.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
           Back to Mangas
        </a>
    </div>
</div>
</x-app-layout>