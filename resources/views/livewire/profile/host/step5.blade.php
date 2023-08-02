<h2 class="text-xl text-gray-800">What do you need help with?</h2>
<p class="text-sm text-gray-600">Select at least 5</p>
<div
    x-data="{ checked: {{ json_encode($selectedServices) }} }"
    class="flex flex-wrap justify-center items-center gap-3 p-4"
>
    @foreach($services as $service)
        <label
            class="block bg-gray-200 px-5 py-2 rounded-full cursor-pointer hover:shadow-md"
            :class="{ 'bg-gray-800 text-white': checked.includes({{ $service->id }}) }"
        >
            <input
                @click="checked.includes({{ $service->id }}) ? checked = checked.filter(i => i !== {{ $service->id }}) : checked.push({{ $service->id }})"
                wire:model="selectedServices"
                type="checkbox"
                value="{{ $service->id }}"
                class="hidden"
            >
            <i class="fa-light {{ $service->icon }} mr-2"></i>
            {{ $service->title }}
        </label>
    @endforeach
</div>
@error('selectedServices')
    <p class="input-error-msg mb-4">{{ $message }}</p>
@endError