<x-app-layout>
    <div class="max-w-3xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">Edit Manga</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('admin.mangas.update', $manga->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Title</label>
                    <input type="text" name="title" value="{{ $manga->title }}" required
                           class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-200 px-3 py-2">
                </div>

                <!-- Description -->
                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea name="description" required rows="4"
                              class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-200 px-3 py-2">{{ $manga->description }}</textarea>
                </div>

                <!-- Cover Image -->
                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Image</label>
                    <input type="file" name="cover_image" class="block w-full text-gray-700 dark:text-gray-200">
                    @if($manga->cover_image)
                        <img src="{{ asset('storage/'.$manga->cover_image) }}" alt="Cover" class="mt-2 w-32 rounded">
                    @endif
                </div>

                <!-- Status -->
                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                    <select name="status" required
                            class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring focus:ring-indigo-300 dark:bg-gray-700 dark:text-gray-200 px-3 py-2">
                        <option value="ongoing" @if($manga->status=='ongoing') selected @endif>Ongoing</option>
                        <option value="completed" @if($manga->status=='completed') selected @endif>Completed</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center">
                    <a href="{{ route('admin.mangas.index') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition">
                       Back to List
                    </a>
                    <button type="submit" 
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md transition">
                        Update Manga
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>