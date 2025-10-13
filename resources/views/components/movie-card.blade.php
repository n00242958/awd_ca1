@props(['movie', 'showAdmin'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <a href="{{ route('movies.show', $movie) }}">
        <h4 class="font-bold text-lg">{!! $movie->title !!}</h4>
        <img src="{{asset( 'images/movies/' . $movie->image )}}" alt="{{ $movie->title }}">
        <h5>{!! $movie->description !!}</h5>
    </a>
    @if ($showAdmin)
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
</div>
