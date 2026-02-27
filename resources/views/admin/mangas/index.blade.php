<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Manage Mangas</h1>
            <a href="{{ route('admin.mangas.create') }}" 
               class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition">
               + Add Manga
            </a>
        </div>

        @if($mangas->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($mangas as $manga)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $manga->title }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $manga->description }}</p>
                        </div>

                        <div class="mt-auto flex flex-col gap-2">
                            <a href="{{ route('admin.mangas.chapters.index', $manga->id) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md text-center transition">
                               Manage Chapters
                            </a>
                            <a href="{{ route('admin.mangas.edit', $manga->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-md text-center transition">
                               Edit
                            </a>
                            <form action="{{ route('admin.mangas.destroy', $manga->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md w-full transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 dark:text-gray-400 mt-10">
                No mangas found. Add a new one!
            </p>
        @endif
    </div>
</x-app-layout>