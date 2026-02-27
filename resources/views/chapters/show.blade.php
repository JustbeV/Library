<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manga Chapter') }}
        </h2>
    </x-slot>
<div class="max-w-3xl mx-auto py-8 px-4">

    <!-- Manga & Chapter Title -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $manga->title }}</h1>
        <h2 class="text-xl text-gray-700 dark:text-gray-300">
            Chapter {{ $chapter->chapter_number }}
            @if($chapter->title) - {{ $chapter->title }} @endif
        </h2>
    </div>

    <!-- Chapter Content -->
    <div class="bg-gray-900 text-gray-100 dark:bg-gray-800 dark:text-gray-200 rounded-lg p-8 mb-8 leading-relaxed shadow-md">
        {!! nl2br(e($chapter->content)) !!}
    </div>

    <!-- Navigation Buttons -->
    @php
        $prevChapter = $manga->chapters()->where('chapter_number', '<', $chapter->chapter_number)->orderBy('chapter_number', 'desc')->first();
        $nextChapter = $manga->chapters()->where('chapter_number', '>', $chapter->chapter_number)->orderBy('chapter_number', 'asc')->first();
    @endphp

    <div class="flex justify-center gap-4 mb-8 flex-wrap">
        @if($prevChapter)
            <a href="{{ route('mangas.chapter', [$manga->id, $prevChapter->id]) }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md transition">
               &larr; Previous
            </a>
        @endif

        <a href="{{ route('mangas.show', $manga->id) }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition">
           Back to Manga
        </a>

        @if($nextChapter)
            <a href="{{ route('mangas.chapter', [$manga->id, $nextChapter->id]) }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md transition">
               Next &rarr;
            </a>
        @endif
    </div>

</div>
</x-app-layout>