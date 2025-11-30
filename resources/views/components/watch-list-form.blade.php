@props(['action', 'method', 'watch_list', 'movies'])

{{-- html form to create a new watch list --}}
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Title</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $watch_list->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('name')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Thumbnail</label>
        {{-- file input for the watch list's poster --}}
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($watch_list) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($watch_list->image)
    <div class="mb-4">
        <img src="{{ asset('images/watch_lists/' . $watch_list->image) }}" alt="Thumbnail" class="w-24 h-32 object-cover">
    </div>
    @endisset

    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        {{-- text input for the watch list's description --}}
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $watch_list->description ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('description')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="movies[]" class="block text-sm text-gray-700">Movies</label>
        {{-- make a checkbox for each movie --}}
        @foreach($movies as $movie)
        <div>
            <input type="checkbox" name="movies[]" value="{{ $movie->id }}" id="movie-{{ $movie->id }}">
            <label for="movie-{{ $movie->id }}">{{ $movie->title }}</label>
        </div>
        @endforeach
        @error('movies')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        {{-- depending on if we are editing an existing watch list change the submit button's text --}}
        <x-primary-button>
            {{ isset($watch_list) ? 'Update Watch List' : 'Add Watch List' }}
        </x-primary-button>
    </div>
</form>
