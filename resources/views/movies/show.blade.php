<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Movie Details') }}
        </h2>
    </x-slot>

    {{-- Display any message provided by the controller on the top of the page. --}}
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <x-alert-failure>
        {{ session('failure') }}
    </x-alert-failure>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Display movie details component --}}
                <x-movie-details
                    :movie="$movie"
                />
            </div>
        </div>
    </div>
</x-app-layout>
