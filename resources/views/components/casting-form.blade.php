@props(['action', 'method', 'casting', 'movie'])

{{-- html form to create a new casting --}}
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="person" class="block text-sm text-gray-700">Person</label>
        <input
            type="text"
            name="person"
            id="person"
            value="{{ old('person', $casting->person ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('person')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="role" class="block text-sm text-gray-700">Role</label>
        {{-- text input for the casting's role --}}
        <input
            type="text"
            name="role"
            id="role"
            value="{{ old('role', $casting->role ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('role')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        {{-- depending on if we are editing an existing casting change the submit button's text --}}
        <x-primary-button>
            {{ isset($casting) ? 'Update Casting' : 'Add Casting' }}
        </x-primary-button>
    </div>
</form>
