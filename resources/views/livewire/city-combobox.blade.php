<div x-data="{ showCityOptions: false }">
    <div @click.outside="showCityOptions = false">
        <div class="relative">
            <input
                wire:model.live.debounce.300ms="query"
                x-ref="query"
                x-on:focus="showCityOptions = true"
                type="text" spellcheck="false" autocomplete="off" role="combobox" aria-controls="options" aria-expanded="false"
                placeholder="Search by city, state or country"
                class="w-full rounded-md border-0 bg-white py-1.5 pl-6 pr-16 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-lg sm:leading-10"
            >
            <button
                type="button" class="absolute inset-y-0 right-0 flex items-center rounded-r-md pr-6 focus:outline-none"
                x-show="$wire.query.length > 0"
                @click="
                    $wire.set('query', '')
                    $wire.set('selectedCityId', null)
                    $refs.query.focus()
                "
            >
                <i class="fa-duotone fa-circle-xmark fa-xl"></i>
            </button>

            <ul x-show="showCityOptions" class="absolute z-30 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox">
                <!--
                    Combobox option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                    Active: "text-white bg-indigo-600", Not Active: "text-gray-900"
                -->
                @forelse($cities as $city)
                    <li
                        x-on:click="
                            $wire.set('query', '{{ $city->name }}')
                            $wire.set('selectedCityId', '{{ $city->id }}')
                            showCityOptions = false
                        "
                        class="relative cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-primary-100" id="option-{{ $city->id }}" role="option" tabindex="-1"
                    >
                        <div class="flex items-center">
                            <img class="h-4 w-auto border-2 border-gray-100" src="{{ asset('assets/flags/countries/svg/' . $city->country_code . '.svg') }}">
                            <!-- Selected: "font-semibold" -->
                            <span class="ml-3 truncate text-gray-900">{{ $city->name }}</span>
                            <span class="ml-2 truncate text-gray-500 text-xs">{{ $city->state->name }}</span>
                        </div>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600 italic text-xs">
                            stat
                        </span>
                    </li>
                @empty
                    <li
                        x-on:click="
                            $wire.set('query', 'Everywhere')
                            $wire.set('selectedCityId', 0)
                        "
                        class="py-2 px-4 text-lg font-bold text-blue-600"
                    >
                        🌏 Explore everywhere
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
