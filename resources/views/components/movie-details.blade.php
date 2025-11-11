@props(['movie'])

<div class="p-6">
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{!! $movie->title !!}</h1>

    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/movies/' . $movie->image) }}" alt="{{ $movie->title }}" class="w-full max-w-xs h-auto object-cover" />
    </div>

    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">
        Release Date: {{ $movie->release_date }}
        <br />
        Review Score: {{ $movie->review_score }}
        <br />
        Age Rating: {{ $movie->age_rating }}
    </h2>

    @if (auth()->user()->role == 'admin')
        {{-- edit/delete buttons --}}
        <div class="mt-4 flex space-x-2">
            <a href="{{ route('movies.edit', $movie) }}">
                Edit
            </a>
            <form action="{{ route('movies.destroy', $movie) }}" method="POST"
            onsubmit="return confirm('Are you sure you wish to delete this movie?');">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Delete
                </button>
            </form>
        </div>
    @endif

    <h4 class="font-semibold text-md mt-8">
        Description
    </h4>

    <p class="text-gray-700 leading-relaxed">
        {!! $movie->description !!}
    </p>

    {{-- castings --}}
    <h4 class="font-semibold text-md mt-8">Cast</h4>
    @if($movie->castings->isEmpty())
        <p class="text-gray-600">No cast members added yet.</p>
    @else
        <ul class="mt-4 space-y-4">
            @foreach($movie->castings as $casting)
                <li class="bg-gray-100 p-4 rounded-lg">
                    <p>{{ $casting->person }}</p>
                    <p>{{ $casting->role }}</p>
                </li>
            @endforeach
        <ul>
    @endif
</div>
