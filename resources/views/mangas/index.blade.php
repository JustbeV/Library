<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mangas Library') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">Mangas Library</h1>

        <!-- Top button -->
        <div class="flex justify-center mb-10">
            <a href="{{ url('/') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
               Return Home
            </a>
        </div>

        <!-- Manga list -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($mangas as $manga)
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5 transition transform hover:scale-105">
                    <h3 class="text-xl font-semibold mb-2 text-indigo-600">{{ $manga->title }}</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $manga->description }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-3"><strong>Status:</strong> {{ ucfirst($manga->status) }}</p>

                    <!-- Chapters -->
                    @if($manga->chapters->count() > 0)
                        <p class="font-semibold text-gray-800 dark:text-gray-200 mb-1">Chapters:</p>
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($manga->chapters->sortBy('chapter_number') as $chapter)
                                <a href="{{ route('mangas.chapter', [$manga->id, $chapter->id]) }}" 
                                   class="bg-indigo-600 text-white px-2 py-1 text-xs rounded hover:bg-indigo-700 transition">
                                    Ch {{ $chapter->chapter_number }}@if($chapter->title) - {{ $chapter->title }}@endif
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400 mb-2">No chapters yet.</p>
                    @endif
                </div>
            @empty
                <p class="text-center text-gray-500 dark:text-gray-400 col-span-full">No mangas found.</p>
            @endforelse
        </div>
    </div>
</div>
</x-app-layout>