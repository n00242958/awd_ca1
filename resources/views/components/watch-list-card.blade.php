@props(['watch_list'])

<div class="text-white border border-gray-500 rounded-lg shadow-md p-6 bg-gray-800 hover:shadow-lg transition duration-300">
    <a href="{{ route('watch_lists.show', $watch_list) }}">
        <h4 class="font-bold text-lg">{!! $watch_list->name !!}</h4>
        <h4 class="font-semibold text-md">Created by {!! $watch_list->user->name !!}</h4>
        <img src="{{asset( 'images/watch_lists/' . $watch_list->image )}}" alt="{{ $watch_list->name }}">
    </a>
    <x-watch-list-admin-controls
        :watch_list="$watch_list"
    />
</div>
