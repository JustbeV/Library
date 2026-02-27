<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manga Chapter') }}
        </h2>
    </x-slot>
<div class="max-w-3xl mx-auto py-8 px-4">

    <!-- Manga & Chapter Title (centered) -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $manga->title }}</h1>
        <h2 class="text-xl text-gray-700 dark:text-gray-300">
            Chapter {{ $chapter->chapter_number }} 
            @if($chapter->title) - {{ $chapter->title }} @endif
        </h2>
    </div>

    <!-- Chapter Content -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-8 text-gray-800 dark:text-gray-200 leading-relaxed whitespace-pre-line">
        {!! e($chapter->content) !!}
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-center gap-4 flex-wrap">
        @php
            $prevChapter = $manga->chapters()->where('chapter_number', '<', $chapter->chapter_number)->orderBy('chapter_number', 'desc')->first();
            $nextChapter = $manga->chapters()->where('chapter_number', '>', $chapter->chapter_number)->orderBy('chapter_number', 'asc')->first();
        @endphp

        @if($prevChapter)
            <a href="{{ route('mangas.chapter', [$manga->id, $prevChapter->id]) }}" 
               class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md transition">&larr; Previous</a>
        @endif

        <a href="{{ route('mangas.index') }}" 
           class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition">Back to Library</a>

        @if($nextChapter)
            <a href="{{ route('mangas.chapter', [$manga->id, $nextChapter->id]) }}" 
               class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md transition">Next &rarr;</a>
        @endif
    </div>

</div>
</x-app-layout>