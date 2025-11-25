<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Watch Lists') }}
        </h2>
    </x-slot>

    {{-- Display any message provided by the controller on the top of the page. --}}
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- show each watch list --}}
                        @foreach($watch_lists as $watch_list)
                        <div class="text-white border border-gray-500 rounded-lg shadow-md p-6 bg-gray-800 hover:shadow-lg transition duration-300">
                            <a href="{{ route('watch_lists.show', $watch_list) }}">
                                <h4 class="font-bold text-lg">{!! $watch_list->name !!}</h4>
                                <img src="{{asset( 'images/watch_lists/' . $watch_list->image )}}" alt="{{ $watch_list->name }}">
                            </a>

                            <x-watch-list-admin-controls
                                :watch_list="$watch_list"
                            />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
