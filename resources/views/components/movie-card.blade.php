@props(['movie'])

<div class="text-white border border-gray-500 rounded-lg shadow-md p-6 bg-gray-800 hover:shadow-lg transition duration-300">
    <a href="{{ route('movies.show', $movie) }}">
        <h4 class="font-bold text-lg">{!! $movie->title !!}</h4>
        <img src="{{asset( 'images/movies/' . $movie->image )}}" alt="{{ $movie->title }}">
        <h5>{!! $movie->description !!}</h5>
    </a>

    <x-movie-admin-controls
        :movie="$movie"
    />
</div>
