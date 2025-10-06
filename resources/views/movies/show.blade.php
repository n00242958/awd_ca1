<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movie Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <x-movie-details
                        :title="$movie->title"
                        :image="$movie->image"
                        :description="$movie->description"
                        :release_date="$movie->release_date"
                        :review_score="$movie->review_score"
                        :age_rating="$movie->age_rating"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
