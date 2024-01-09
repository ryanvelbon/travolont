<h2>What do you need help with?</h2>
<p class="text-sm text-gray-600">Select at least 5</p>
<div
    x-data="{ checked: @entangle('selectedServices') }"
    class="flex flex-wrap justify-center items-center gap-3 p-4"
>
    <div x-text="checked"></div>
    @foreach($services as $service)
        <label
            wire:key="{{ $service->id }}"
            class="block px-5 py-2 rounded-full cursor-pointer select-none"
            :class="checked.includes({{ $service->id }}) ? 'bg-secondary-300' : 'bg-white border border-gray-500 hover:border-gray-700 text-gray-600 hover:text-gray-800'"
        >
            <input
                wire:model="selectedServices"
                type="checkbox"
                value="{{ $service->id }}"
            >
            <i class="fa-light {{ $service->icon }} mr-2"></i>
            {{ $service->title }}
        </label>
    @endforeach
</div>
@error('selectedServices')
    <p class="input-error-msg mb-4">{{ $message }}</p>
@endError