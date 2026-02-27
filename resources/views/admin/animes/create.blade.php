<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Anime') }}
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

                <form action="{{ route('admin.animes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                               class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-gray-200">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Description</label>
                        <textarea name="description" rows="4" 
                                  class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-gray-200">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Status</label>
                        <select name="status" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-gray-200">
                            <option value="ongoing" {{ old('status')=='ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('status')=='completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 mb-2">Video (optional)</label>
                        <input type="file" name="video" accept="video/*" class="w-full">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.animes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Anime</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>