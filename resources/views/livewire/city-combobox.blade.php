<div x-data>
    <input
        wire:model="search"
        type="text"
        placeholder="Search..."
        spellcheck="false"
        class="w-full"
    >

    <div class="mt-2">
        <ul>
            @forelse($cities as $city)
                <li
                    class="hover:bg-primary-300"
                    wire:click="$emit('citySelected', {{ $city->id }})"
                >
                    <span>{{ $city->name }}</span>
                    <span class="text-xs text-gray-600">{{ $city->state_code }}</span>
                    <span class="text-xs text-gray-600 italic">{{ $city->country->name}}</span>
                </li>
            @empty
                <li class="text-xs text-gray-600 italic">No cities found.</li>
            @endforelse
        </ul>
    </div>

</div>