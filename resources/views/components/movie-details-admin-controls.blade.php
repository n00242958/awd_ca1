@props(['movie'])

@if (auth()->user()->role == 'admin')
<div>
    <h4 class="font-semibold text-white text-md mt-8">ADMIN: Add a Casting</h4>

    {{-- casting form --}}
    <form action="{{ route('castings.store', $movie) }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="person" class="block font-medium text-white text-sm">Person</label>
            <input type="text" name="person" id="person" rows="3" required class="mt-1 block w-full" />
            @error('person')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block font-medium text-white text-sm">Role</label>
            <input type="text" name="role" id="role" rows="3" required class="mt-1 block w-full" />
            @error('role')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Submit Casting
        </button>
    </form>
</div>
@endif
