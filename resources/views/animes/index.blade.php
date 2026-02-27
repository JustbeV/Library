<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Animes Library') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Title -->
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">Anime Library</h1>

        <!-- Top Button -->
        <div class="flex justify-center mb-10">
            <a href="{{ url('/') }}" 
               class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700 transition">
               Return Home
            </a>
        </div>

        <!-- Anime List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($animes as $anime)
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-5 transition transform hover:scale-105 flex flex-col justify-between">
                    <!-- Anime Info -->
                    <div>
                        <h3 class="text-xl font-semibold mb-2 text-indigo-600">{{ $anime->title }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-2 line-clamp-3">{{ $anime->description }}</p>
                        <p class="text-gray-600 dark:text-gray-400 mb-4"><strong>Status:</strong> {{ ucfirst($anime->status) }}</p>
                    </div>

                    <!-- Playable Video Preview -->
                    @if($anime->video)
                        <video controls class="w-full rounded mb-2 max-h-40 object-cover">
                            <source src="{{ asset('storage/'.$anime->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif

                    <!-- View Button -->
                    <div class="mt-auto text-center">
                        <a href="{{ route('animes.show', $anime->id) }}" 
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                           View Details
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 dark:text-gray-400 col-span-full">No animes found.</p>
            @endforelse
        </div>
    </div>
</div>
</x-app-layout>