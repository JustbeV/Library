<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manga Details') }}
        </h2>
    </x-slot>
<div class="max-w-4xl mx-auto py-8 px-4">

    <!-- Manga Info -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $manga->title }}</h1>
        <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $manga->description }}</p>
        <p class="text-gray-600 dark:text-gray-400"><strong>Status:</strong> {{ ucfirst($manga->status) }}</p>
    </div>

    <!-- Chapters List -->
    <div class="mt-6">
        <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Chapters</h2>

        @if($manga->chapters->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($manga->chapters->sortBy('chapter_number') as $chapter)
                    <a href="{{ route('mangas.chapter', [$manga->id, $chapter->id]) }}" 
                       class="block p-4 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition text-gray-800 dark:text-gray-200">
                        Chapter {{ $chapter->chapter_number }}
                        @if($chapter->title) - {{ $chapter->title }} @endif
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">No chapters yet.</p>
        @endif
    </div>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="{{ route('mangas.index') }}" 
           class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md transition">Return to Library</a>
    </div>

</div>
</x-app-layout>