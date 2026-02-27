<x-app-layout>
<div class="max-w-3xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">
        Edit Chapter {{ $chapter->chapter_number }} for "{{ $manga->title }}"
    </h1>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <form action="{{ route('admin.mangas.chapters.update', [$manga->id, $chapter->id]) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Chapter Number -->
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Chapter Number</label>
                <input type="number" name="chapter_number" value="{{ $chapter->chapter_number }}" required
                       class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-200 px-3 py-2">
            </div>

            <!-- Title -->
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Title (Optional)</label>
                <input type="text" name="title" value="{{ $chapter->title }}"
                       class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-200 px-3 py-2">
            </div>

            <!-- Content -->
            <div>
                <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Content</label>
                <textarea name="content" rows="6" required
                          class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-200 px-3 py-2">{{ $chapter->content }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.mangas.chapters.index', $manga->id) }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                   Back to Chapters
                </a>
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md transition">
                    Update Chapter
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>