@props(['movie'])

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
