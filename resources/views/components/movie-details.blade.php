@props(['title', 'image', 'description', 'release_date', 'review_score', 'age_rating'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration:300 max-w-xl mx-auto">
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{!! $title !!}</h1>

    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/movies/' . $image) }}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-cover" />
    </div>

    <h2 class="text-gray-500 text-sm italic mb-4" style="font-size: 1rem;">
        Release Date: {{ $release_date }}
        <br />
        Review Score: {{ $review_score }}
        <br />
        Age Rating: {{ $age_rating }}
    </h2>

    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">
        Description
    </h3>

    <p class="text-gray-700 leading-relaxed">
        {!! $description !!}
    </p>
</div>
