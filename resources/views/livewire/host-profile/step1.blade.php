<p class="text-gray-800 text-base sm:text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod?</p>
<div
    x-data="{ typeId: '{{ $host->type_id }}' }"
    class="grid grid-cols-1 sm:grid-cols-2 gap-1 py-4"
>
    @foreach($hostTypes as $hostType)
        <label
            class="py-3 flex justify-center items-center bg-gray-200 cursor-pointer"
            :class="{
                'bg-primary-300': typeId == '{{ $hostType->id }}',
                'hover:bg-gray-300': typeId != '{{ $hostType->id }}'
            }"
            @click="typeId = '{{ $hostType->id }}'"
        >
            <input type="radio" value="{{ $hostType->id }}" wire:model="host.type_id" class="hidden">
            <i class="fa-solid fa-{{ $hostType->icon }} mr-4"></i>
            <span>{{ $hostType->title }}</span>
        </label>
    @endforeach

    @error('host.type_id')
        <p class="input-error-msg">{{ $message }}</p>
    @endError
</div>