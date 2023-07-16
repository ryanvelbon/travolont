<div x-data="{ open: false }">
  <label for="combobox" class="block text-sm font-medium leading-6 text-gray-900">City</label>
  <div class="relative mt-2">
    <input
      wire:model="search"
      @click.away="open = false"
      @input="open = true"
      id="combobox"
      type="text"
      placeholder="Search..."
      spellcheck="false"
      class="w-full rounded-md border-0 bg-white py-1.5 pl-3 pr-12 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      role="combobox" aria-controls="options" aria-expanded="false"
    >

    <ul
      x-show="open && $wire.search.length > 0"
      class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" id="options" role="listbox"
    >
      <!--
        Combobox option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

        Active: "text-white bg-indigo-600", Not Active: "text-gray-900"
      -->
      @forelse($cities as $city)
        <li
          wire:click="$emit('citySelected', {{ $city->id }})"
          class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-primary-100 cursor-pointer"
          role="option"
          tabindex="-1"
        >
          <div class="flex">
            <span class="truncate">{{ $city->name }}</span>
            <span class="text-xs text-gray-600 ml-2">{{ $city->state_code }}</span>
            <span class="text-xs text-gray-600 italic ml-2">{{ $city->country->name}}</span>
          </div>
        </li>
      @empty
        <li class="text-xs text-gray-600 italic">No cities found.</li>
      @endforelse
    </ul>
  </div>
</div>
