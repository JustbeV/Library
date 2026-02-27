<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Manga Card -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                <h2 class="text-2xl font-bold">{{ $mangaCount }}</h2>
                <p>Total Mangas</p>
                <div class="mt-4 flex justify-center gap-4 flex-wrap">
                    <!-- Public View -->
                    <a href="{{ route('admin.mangas.index') }}" class="button bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        View Mangas
                    </a>

                    <!-- Admin Actions -->
                    @auth
                        @if(auth()->user()->is_admin ?? false)
                            <a href="{{ route('admin.mangas.index') }}" class="button bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                                Manage Mangas
                            </a>
                            <a href="{{ route('admin.mangas.create') }}" class="button bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                                Add Manga
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Anime Card -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                <h2 class="text-2xl font-bold">{{ $animeCount }}</h2>
                <p>Total Animes</p>
                <div class="mt-4 flex justify-center gap-4 flex-wrap">
                    <!-- Public View -->
                    <a href="{{ route('admin.animes.index') }}" class="button bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        View Animes
                    </a>

                    <!-- Admin Actions -->
                    @auth
                        @if(auth()->user()->is_admin ?? false)
                            <a href="{{ route('admin.animes.index') }}" class="button bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                                Manage Animes
                            </a>
                            <a href="{{ route('admin.animes.create') }}" class="button bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                                Add Anime
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

        </div>
    </div>
</x-app-layout>