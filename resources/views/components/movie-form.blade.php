@props(['action', 'method'])

<!-- html form to create a new movie -->
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <!-- text input for the movie's title -->
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $movie->title ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('title')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Movie Poster Image</label>
        <!-- file input for the movie's poster -->
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($movie) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($movie->image)
    <div class="mb-4">
        <img src="{{ asset($movie->image) }}" alt="Movie poster" class="w-24 h-32 object-cover">
    </div>
    @endisset

    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <!-- text input for the movie's description -->
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $movie->description ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('description')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="release_date" class="block text-sm text-gray-700">Release Date</label>
        <!-- text input for the movie's release date -->
        <input
            type="text"
            name="release_date"
            id="release_date"
            value="{{ old('release_date', $movie->release_date ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('release_date')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="review_score" class="block text-sm text-gray-700">Review Score</label>
        <!-- text input for the movie's review score -->
        <input
            type="text"
            name="review_score"
            id="review_score"
            value="{{ old('review_score', $movie->review_score ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('review_score')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="age_rating" class="block text-sm text-gray-700">Age Rating</label>
        <!-- text input for the movie's age rating -->
        <input
            type="text"
            name="age_rating"
            id="age_rating"
            value="{{ old('age_rating', $movie->age_rating ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('age_rating')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <!-- depending on if we are editing an existing movie change the submit button's text -->
        <x-primary-button>
            {{ isset($movie) ? 'Update Movie' : 'Add Movie' }}
        </x-primary-button>
    </div>
</form>
