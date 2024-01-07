<div
    x-data="{ mobileFilterDialogOpen: false }"
    class="bg-white"
>
    <div>
        <!-- Mobile filter dialog -->
        <div
            x-show="mobileFilterDialogOpen"
            class="relative z-40 lg:hidden"
            role="dialog"
            aria-modal="true"
        >
            <div
                x-show="mobileFilterDialogOpen"
                x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black bg-opacity-25"
            ></div>

            <div
                x-show="mobileFilterDialogOpen"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed inset-0 z-40 flex"
            >
                <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-6 shadow-xl">
                    <div class="flex items-center justify-between px-4">
                        <h2 class="text-lg font-medium text-gray-900">Filtered Search</h2>
                        <button type="button" @click="mobileFilterDialogOpen = false" class="-mr-2 flex h-10 w-10 items-center justify-center p-2 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Filters -->
                    <form class="mt-4">
                        <div class="border-t border-gray-200 pb-4 pt-4">
                            <fieldset x-data="{ open: true }">
                                <legend class="w-full px-2">
                                    <!-- Expand/collapse section button -->
                                    <button @click="open = !open" type="button" class="flex w-full items-center justify-between p-2 text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                                        <span class="text-sm font-medium text-gray-900">Color</span>
                                        <span class="ml-6 flex h-7 items-center">
                                            <svg :class="{'-rotate-180': open, 'rotate-0': !open}" class="h-5 w-5 transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </legend>
                                <div x-show="open" class="px-4 pb-2 pt-4" id="filter-section-0">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="color-0-mobile" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="color-0-mobile" class="ml-3 text-sm text-gray-500">White</label>
                                        </div>
                                        <!-- more options -->
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <main class="px-4 lg:px-8">
            <div class="border-b border-gray-200 pb-10">
                <h1 class="mt-4 text-base text-gray-500">
                    Volunteer Opportunities
                    @if($selectedCity)
                        in {{ App\Models\City::find($selectedCity)->name }}
                    @endif
                </h1>
            </div>

            <div class="lg:flex lg:gap-4">
                <aside class="lg:w-96">
                    <h2 class="sr-only">Filters</h2>

                    <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
                    <button
                        type="button"
                        @click="mobileFilterDialogOpen = true"
                        class="inline-flex items-center lg:hidden mb-6"
                    >
                        <span class="text-sm font-medium text-gray-700">Filters</span>
                        <svg class="ml-1 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                    </button>

                    <div class="hidden lg:block">
                        <div class="space-y-10 divide-y divide-gray-200">
                            @livewire('city-combobox')
                            <fieldset class="mt-6">
                                <legend class="block text-sm font-medium text-gray-900">Categories</legend>
                                <div class="flex flex-wrap gap-2 pt-6">
                                    @foreach($hostTypes as $hostType)
                                        <label
                                            wire:key="{{ $hostType->id }}"
                                            class="text-sm text-gray-600 px-4 py-2 rounded-full cursor-pointer select-none border border-gray-300"
                                        >
                                            <input
                                                value="{{ $hostType->id }}"
                                                type="checkbox"
                                            >
                                            <span>{{ $hostType->title }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </aside>

                <!-- Results -->
                <div>
                    <ul role="list" class="flex flex-col gap-4">
                        @forelse($hosts as $host)
                            <a href="#">
                                <li class="flex flex-col md:flex-row shadow-md border border-gray-100 hover:border-gray-300 hover:shadow-lg">
                                    <div class="w-full md:w-72">
                                        <img
                                            src="{{ asset('images/' . $host->feat_img) }}"
                                            onerror="this.onerror=null;this.src='https://placehold.co/800x800/png';"
                                        >
                                    </div>
                                    <div class="flex-1 flex flex-col gap-4 justify-between px-4 py-4">
                                        <div class="flex justify-between">
                                            <div class="flex gap-2">
                                                @if(isset($host->city))
                                                    <img class="h-6" src="{{ asset('assets/flags/countries/svg/' . $host->city->country->iso2 . '.svg') }}">
                                                    <span class="text-gray-600 text-sm">{{ $host->city->name }}, <span class="font-mono">{{ $host->city->country->name }}</span></span>
                                                @endif
                                            </div>
                                            <div>
                                                <span class="mr-2"><i class="fa-solid fa-star mr-1"></i>5.0</span>
                                                @if(isset($host->type))
                                                    <span class="bg-black text-sm text-white px-3 py-2">
                                                        <i class="fa-solid fa-{{$host->type->icon}}"></i>
                                                        <span class="ml-3">{{ $host->type->title }}</span>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex gap-4">
                                            <div class="flex-1">
                                                <h2 class="text-lg font-bold text-gray-800 mb-2">Learn Organic Farming in the Heart of Bali</h2>
                                                <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div>
                                                <img
                                                    class="rounded-full h-24"
                                                    src="{{ $host->user->avatarUrl() }}"
                                                    
                                                >
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="emoji-info-list grid grid-cols-3 gap-4 text-gray-700 text-sm">
                                                <li>
                                                    <dt>🕓</dt>
                                                    <dd>10 hours<sub>per week</sub></dd>
                                                </li>
                                                <li>
                                                    <dt>💰</dt>
                                                    <dd>VND 50.000<sub>per hour</sub></dd>
                                                </li>
                                                <li>
                                                    <dt>🍽</dt>
                                                    <dd>3 meals<sub>per day</sub></dd>
                                                </li>
                                                <li>
                                                    <dt>🛏</dt>
                                                    <dd>private room</dd>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </a>
                        @empty
                            <div class="bg-gray-200 text-gray-700">No results.</div>
                        @endforelse
                    </ul>

                    <div class="py-3">
                        {{ $hosts->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
