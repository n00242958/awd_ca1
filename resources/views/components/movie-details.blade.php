@props(['movie'])

<div class="p-6">
    <h1 class="font-bold text-white mb-2" style="font-size: 3rem;">{!! $movie->title !!}</h1>

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

    <x-movie-admin-controls
        :movie="$movie"
    />

    <h4 class="text-white font-semibold text-md mt-8">
        Description
    </h4>

    <p class="text-white leading-relaxed">
        {!! $movie->description !!}
    </p>

    {{-- castings --}}
    <h4 class="font-semibold text-white text-md mt-8">Cast</h4>
    @if($movie->castings->isEmpty())
        <p class="text-white">No cast members added yet.</p>
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

    <x-movie-details-admin-controls
        :movie="$movie"
    />
</div>
