<div class="md:flex">
    <div
        wire:listen="citySelected"
        class="bg-gray-300 md:w-96 p-2"
    >
        @livewire('city-combobox')
    </div>
    <div class="grow bg-gray-200 p-2">
        <h2>results</h2>
        <div>
            @forelse($hosts as $host)
                <a href="#">
                    <div class="bg-gray-400 p-4 mt-2">
                        <div class="flex gap-x-2">
                            <div class="bg-gray-300">
                                <h3 class="text-md font-semibold">{{ $host->user->full_name }}</h3>
                            </div>
                            <div class="grow bg-gray-100">
                                <div class="flex text-sm text-gray-700">
                                    <div>
                                        <i class="fa-solid fa-{{$host->type->icon}}"></i>
                                        <span>{{ $host->type->title }}</span>
                                    </div>
                                    <span class="ml-4">
                                        <i class="fa-regular fa-location-dot"></i>
                                        <span>{{ $host->city->name }}</span>
                                    </span>
                                </div>
                                <h2 class="text-lg font-bold">{{ $host->title }}</h2>
                                <p class="text-gray-600">{{ $host->description }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="bg-gray-200 text-gray-700">No results.</div>
            @endforelse
        </div>
        <div class="p-6">
            {{ $hosts->links() }}
        </div>
    </div>
</div>
