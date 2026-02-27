<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Anime Details') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Anime Title & Description -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ $anime->title }}</h1>
            <p class="text-gray-600 dark:text-gray-400">{{ $anime->description }}</p>
        </div>

        <!-- Main Anime Video -->
        @if($anime->video)
            <div class="mb-8">
                <video controls class="w-full rounded-lg">
                    <source src="{{ asset('storage/'.$anime->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

        <!-- Episodes Grid -->
        <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Episodes</h2>
        @if($anime->episodes->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($anime->episodes->sortBy('episode_number') as $episode)
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5 hover:scale-105 transform transition">
                        <h3 class="text-lg font-semibold text-indigo-600 mb-2">
                            Episode {{ $episode->episode_number }} - {{ $episode->title }}
                        </h3>
                        @if($episode->video_url)
                            <video controls class="w-full rounded mb-2">
                                <source src="{{ asset('storage/'.$episode->video_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <p class="text-gray-500 dark:text-gray-400">Video not available</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 dark:text-gray-400">No episodes yet.</p>
        @endif

        <!-- Back Button -->
        <div class="flex justify-center mt-8">
            <a href="{{ route('animes.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md transition">
               Back to Anime Library
            </a>
        </div>
    </div>
</div>
</x-app-layout>