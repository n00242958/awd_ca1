@props(['watch_list'])

<div class="p-6">
    <h1 class="font-bold text-white mb-2" style="font-size: 3rem;">{!! $watch_list->name !!}</h1>

    <h4 class="font-semibold text-white text-md">Created by {!! $watch_list->user->name !!}</h4>

    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/watch_lists/' . $watch_list->image) }}" alt="{{ $watch_list->name }}" class="w-full max-w-xs h-auto object-cover" />
    </div>

    <x-watch-list-admin-controls
        :watch_list="$watch_list"
    />

    {{-- movies --}}
    <h4 class="font-semibold text-white text-md mt-8">Movies</h4>
    @if($watch_list->movies->isEmpty())
        <p class="text-white">No movies added yet.</p>
    @else
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- for each movie display a MovieCard with the appropriate content --}}
                @foreach($watch_list->movies as $movie)
                <x-movie-card
                    :movie="$movie"
                />
                @endforeach
            </div>
        </div>
    @endif
</div>
