<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Watch List Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Display watch list details component --}}
                <x-watch-list-details
                    :watch_list="$watchList"
                />
            </div>
        </div>
    </div>
</x-app-layout>
