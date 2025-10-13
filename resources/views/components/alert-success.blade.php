@if(session('success'))
<!-- green box with message -->
<div class="mb-4 px-4 py-2 bg-green-100 border border-green-500 text-green-700 rounded-md">
    {{ $slot }}
</div>
@endif
