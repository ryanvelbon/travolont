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
                        <h2 class="text-lg font-medium text-gray-900">Find Travelers</h2>
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
                                        <div class="flex items-center">
                                            <input id="color-1-mobile" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="color-1-mobile" class="ml-3 text-sm text-gray-500">Beige</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="color-2-mobile" name="color[]" value="blue" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="color-2-mobile" class="ml-3 text-sm text-gray-500">Blue</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="color-3-mobile" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="color-3-mobile" class="ml-3 text-sm text-gray-500">Brown</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="color-4-mobile" name="color[]" value="green" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="color-4-mobile" class="ml-3 text-sm text-gray-500">Green</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="color-5-mobile" name="color[]" value="purple" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="color-5-mobile" class="ml-3 text-sm text-gray-500">Purple</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="border-t border-gray-200 pb-4 pt-4">
                            <fieldset x-data="{ open: false }">
                                <legend class="w-full px-2">
                                    <!-- Expand/collapse section button -->
                                    <button @click="open = !open" type="button" class="flex w-full items-center justify-between p-2 text-gray-400 hover:text-gray-500" aria-controls="filter-section-1" aria-expanded="false">
                                        <span class="text-sm font-medium text-gray-900">Category</span>
                                        <span class="ml-6 flex h-7 items-center">
                                            <svg :class="{'-rotate-180': open, 'rotate-0': !open}" class="h-5 w-5 transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </legend>
                                <div x-show="open" class="px-4 pb-2 pt-4" id="filter-section-1">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="category-0-mobile" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="category-0-mobile" class="ml-3 text-sm text-gray-500">All New Arrivals</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="category-1-mobile" name="category[]" value="tees" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="category-1-mobile" class="ml-3 text-sm text-gray-500">Tees</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="category-2-mobile" name="category[]" value="crewnecks" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="category-2-mobile" class="ml-3 text-sm text-gray-500">Crewnecks</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="category-3-mobile" name="category[]" value="sweatshirts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="category-3-mobile" class="ml-3 text-sm text-gray-500">Sweatshirts</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="category-4-mobile" name="category[]" value="pants-shorts" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="category-4-mobile" class="ml-3 text-sm text-gray-500">Pants &amp; Shorts</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="border-t border-gray-200 pb-4 pt-4">
                            <fieldset x-data="{ open: false }">
                                <legend class="w-full px-2">
                                    <!-- Expand/collapse section button -->
                                    <button @click="open = !open" type="button" class="flex w-full items-center justify-between p-2 text-gray-400 hover:text-gray-500" aria-controls="filter-section-2" aria-expanded="false">
                                        <span class="text-sm font-medium text-gray-900">Sizes</span>
                                        <span class="ml-6 flex h-7 items-center">
                                            <svg :class="{'-rotate-180': open, 'rotate-0': !open}" class="h-5 w-5 transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </legend>
                                <div x-show="open" class="px-4 pb-2 pt-4" id="filter-section-2">
                                    <div class="space-y-6">
                                        <div class="flex items-center">
                                            <input id="sizes-0-mobile" name="sizes[]" value="xs" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="sizes-0-mobile" class="ml-3 text-sm text-gray-500">XS</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="sizes-1-mobile" name="sizes[]" value="s" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="sizes-1-mobile" class="ml-3 text-sm text-gray-500">S</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="sizes-2-mobile" name="sizes[]" value="m" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="sizes-2-mobile" class="ml-3 text-sm text-gray-500">M</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="sizes-3-mobile" name="sizes[]" value="l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="sizes-3-mobile" class="ml-3 text-sm text-gray-500">L</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="sizes-4-mobile" name="sizes[]" value="xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="sizes-4-mobile" class="ml-3 text-sm text-gray-500">XL</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="sizes-5-mobile" name="sizes[]" value="2xl" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                            <label for="sizes-5-mobile" class="ml-3 text-sm text-gray-500">2XL</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <main class="relative bg-test-2 lg:px-8 min-h-screen">

            <x-loading />

            <h1 class="text-3xl font-bold tracking-tight text-gray-900 pt-6">Find fellow Travelers</h1>

            <div class="block lg:hidden bg-gray-300 p-8">
                Your Advert Here!
            </div>

            <div class="bg-test-3 pt-12 lg:grid lg:grid-cols-4 lg:gap-x-8 xl:grid-cols-5">
                <aside>
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
                        <form class="space-y-10 divide-y divide-gray-200">
                            <div>
                                <legend class="block text-sm font-medium text-gray-900">Gender</legend>
                                <fieldset x-data="{ sex: '' }" class="flex gap-2 justify-center items-center mt-4">
                                    <label
                                        class="radio-btn w-16 h-16 rounded-xl flex flex-col gap-1 justify-center items-center"
                                        :class="{'bg-secondary-300 text-black': sex == 'm', 'bg-white hover:bg-secondary-100': sex != 'm'}"
                                    >
                                        <input x-model="sex" wire:model.live="sex" value="m" type="radio" class="hidden">
                                        <i class="fa-regular fa-mars"></i>
                                        <p class="text-xs">Male</p>
                                    </label>
                                    <label
                                        class="radio-btn w-16 h-16 rounded-xl flex flex-col gap-1 justify-center items-center"
                                        :class="{'bg-secondary-300 text-black': sex == 'f', 'bg-white hover:bg-secondary-100': sex != 'f'}"
                                    >
                                        <input x-model="sex" wire:model.live="sex" value="f" type="radio" class="hidden">
                                        <i class="fa-regular fa-venus"></i>
                                        <p class="text-xs">Female</p>
                                    </label>
                                    <label
                                        class="radio-btn w-16 h-16 rounded-xl flex flex-col gap-1 justify-center items-center"
                                        :class="{'bg-secondary-300 text-black': sex == '', 'bg-white hover:bg-secondary-1000': sex != ''}"
                                    >
                                        <input x-model="sex" wire:model.live="sex" value="" type="radio" class="hidden">
                                        <i class="fa-regular fa-venus-mars"></i>
                                        <p class="text-xs">Both</p>
                                    </label>
                                </fieldset>
                            </div>
                            <div>
                                @livewire('city-combobox')
                            </div>
                            <div>
                                <label for="nationality">Nationality</label>
                                <select wire:model.live="nationality" id="nationality" class="w-full">
                                    <option value="" selected>-- select --</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label>Age</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <input wire:model.live="minAge" type="number">
                                    <input wire:model.live="maxAge" type="number">
                                </div>
                                @error('minAge')
                                    <div class="input-error-msg">{{ $message }}</div>
                                @endError
                                @error('maxAge')
                                    <div class="input-error-msg">{{ $message }}</div>
                                @endError
                            </div>
                        </form>
                    </div>
                </aside>

                <!-- Results -->
                <div class="bg-test-1 lg:col-span-2 xl:col-span-3">
                    <ul role="list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                        @forelse($members as $member)
                            <a href="{{ route('travelers.show', $member->username) }}">
                                <li class="shadow-lg hover:shadow-2xl">
                                    <img class="aspect-[3/2] w-full object-cover" src="{{ $member->avatarUrl() }}" alt="">
                                    <div class="p-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-lg font-semibold leading-8 tracking-tight text-gray-900">{{ $member->full_name }}</span>
                                            <span class="text-base text-gray-700">
                                                {{ $member->age ? $member->age : '' }}
                                                @if($member->sex)
                                                    @if($member->sex === 'm')
                                                        <i class="fa-light fa-mars"></i>
                                                    @elseif($member->sex === 'f')
                                                        <i class="fa-light fa-venus"></i>
                                                    @else
                                                    @endif
                                                @endif
                                            </span>
                                        </div>
                                        <!-- <div class="text-base leading-7 text-gray-600 flex items-center gap-2"> -->
                                        <div class="flex justify-between text-gray-600">
                                            <div>
                                                @if($member->travelerProfile->currentCity)
                                                    <i class="fa-light fa-location-dot"></i>
                                                    <span class="truncate text-sm">{{ $member->travelerProfile->currentCity->name }}</span>
                                                    <span class="truncate text-xs">{{ $member->travelerProfile->currentCity->country->name }}</span>
                                                @endif
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <i class="fa-light fa-passport fa-xl"></i>
                                                <img class="w-8 h-6 border-2 border-gray-100" src="{{ asset('assets/flags/countries/svg/'. $member->countryOfOrigin->iso2 . '.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </a>
                        @empty
                            <div class="col-span-full h-screen text-gray-700 text-center pt-32">
                                <h3 class="font-bold text-2xl mb-4">No travelers found</h3>
                                <p>There are no matching travelers for your search criteria. Try updating your search.</p>
                            </div>
                        @endforelse
                    </ul>
                    <div class="p-6">
                        {{ $members->links() }}
                    </div>
                </div>

                <aside class="bg-gray-300">
                    Your Advert Here!
                </aside>
            </div>
        </main>
    </div>
</div>
