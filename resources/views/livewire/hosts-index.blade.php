<div class="lg:flex">
    <div
        wire:listen="citySelected"
        class="bg-gray-300 lg:w-[16rem] p-2 flex-none"
    >
        @livewire('city-combobox')

        <fieldset class="mt-4">
            <legend class="text-base font-semibold leading-6 text-gray-900">What experience?</legend>
            <div class="mt-1">
                @foreach($hostTypes as $hostType)
                <div class="relative flex items-start py-1">
                    <div class="min-w-0 flex-1 text-xs leading-6">
                        <i class="fa-solid fa-{{ $hostType->icon }}"></i>
                        <label for="host-type-{{ $hostType->id }}" class="select-none font-medium text-gray-900 ml-2">{{ $hostType->title }}</label>
                    </div>
                    <div class="ml-3 flex h-6 items-center">
                        <input
                            wire:model="selectedHostTypes"
                            value="{{ $hostType->id }}"
                            id="host-type-{{ $hostType->id }}"
                            type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600"
                        >
                    </div>
                </div>
                @endforeach
            </div>
        </fieldset>

    </div>
    <div class="grow bg-gray-200 p-2">
        <h2 class="text-2xl font-bold">{{ $hosts->total() }} Volunteering Opportunities in City</h2>
        <div>
            @forelse($hosts as $host)
                <a href="#">
                    <div class="bg-test-1 bg-white p-4 mt-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">

                            <!-- Experience featured image -->
                            <div class="order-1 md:order-1 bg-test-3">
                                <img class="rounded-lg" src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=500">
                            </div>

                            <!-- Experience info -->
                            <div class="order-2 sm:order-3 md:order-2 sm:col-span-2 bg-test-2">
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
                                <h2 class="text-lg font-bold mt-2">{{ $host->title }}</h2>
                                <p class="text-gray-600 text-sm">{{ $host->description }}</p>
                            </div>

                            <!-- Host info -->
                            <div class="order-3 sm:order-2 md:order-3 bg-test-3 p-2 text-center flex">
                                <div class="bg-test-4">
                                    <img class="rounded-full" src="https://images.unsplash.com/photo-1509506489701-dfe23b067808?w=500" alt="User profile picture">
                                    <h3 class="text-md font-semibold mt-2">{{ $host->user->first_name }}</h3>
                                    <div>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star fa-xs"></i>
                                        <i class="fa-solid fa-star-half-stroke fa-xs"></i>
                                        <i class="fa-regular fa-star fa-xs"></i>
                                    </div>
                                </div>
                                <div class="sm:hidden bg-test-2 flex items-center p-2">
                                    <p class="text-xs text-gray-600 italic">{{ $host->user->bio }}</p>
                                </div>
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
    <div class="bg-gray-300 w-96">
        adverts
    </div>
</div>
