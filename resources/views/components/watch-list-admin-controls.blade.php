@props(['watch_list'])

@if (auth()->user()->role == 'admin')
{{-- edit/delete buttons --}}
<div class="mt-4 flex space-x-2 text-white">
    <a href="{{ route('watch_lists.edit', $watch_list) }}">
        Edit
    </a>
    <form action="{{ route('watch_lists.destroy', $watch_list) }}" method="POST"
        onsubmit="return confirm('Are you sure you wish to delete this watch list?');">
        @csrf
        @method('DELETE')
        <button type="submit">
            Delete
        </button>
    </form>
</div>
@endif
