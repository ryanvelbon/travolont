<h2 class="text-xl text-gray-800">What do you need help with?</h2>
<p class="text-sm text-gray-600">Select at least 5</p>
<div class="flex flex-wrap justify-center items-center gap-3 p-4">
    @foreach($services as $service)
        <label class="block bg-gray-200 px-5 py-2 rounded-full">
            <input value="{{ $service->id }}" type="checkbox">
            {{ $service->title }}
        </label>
    @endforeach
</div>