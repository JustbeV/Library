<x-app-layout>
   
<div class="py-12">
    <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-4 text-gray-800 dark:text-gray-200">
            Welcome to Your Anime & Manga Library!
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mb-10">
            Explore and enjoy your favorite Manga & Anime collections here.
        </p>

        <div class="flex justify-center gap-8 flex-wrap">
            <!-- Manga Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 w-64 text-center transition transform hover:scale-105">
                <h2 class="text-3xl font-bold mb-2 text-indigo-600">{{ $mangaCount }}</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">Total Mangas</p>
                <a href="{{ route('mangas.index') }}" 
                   class="inline-block bg-indigo-600 text-white font-semibold px-4 py-2 rounded hover:bg-indigo-700 transition">
                    View Mangas
                </a>
            </div>

            <!-- Anime Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 w-64 text-center transition transform hover:scale-105">
                <h2 class="text-3xl font-bold mb-2 text-green-500">{{ $animeCount }}</h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">Total Animes</p>
                <a href="{{ route('animes.index') }}" 
                   class="inline-block bg-green-500 text-white font-semibold px-4 py-2 rounded hover:bg-green-600 transition">
                    View Animes
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>