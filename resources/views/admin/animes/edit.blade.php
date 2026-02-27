<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Anime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-6 text-red-600">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.animes.update', $anime->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title', $anime->title) }}" 
                               class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-gray-200">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Description</label>
                        <textarea name="description" rows="4" 
                                  class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-gray-200">{{ old('description', $anime->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Status</label>
                        <select name="status" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-gray-200">
                            <option value="ongoing" {{ old('status', $anime->status)=='ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('status', $anime->status)=='completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Video (optional)</label>
                        @if($anime->video)
                            <video controls class="w-full mb-2 rounded">
                                <source src="{{ asset('storage/'.$anime->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                        <input type="file" name="video" accept="video/*" class="w-full">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.animes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Anime</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>