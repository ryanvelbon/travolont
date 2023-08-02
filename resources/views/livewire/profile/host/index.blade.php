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

    <main class="bg-test-2 px-4 lg:px-8">
      <div class="border-b border-gray-200 pb-10">
        <h1 class="mt-4 text-base text-gray-500">
          Volunteer Opportunities
          @if($selectedCity)
            in {{ App\Models\City::find($selectedCity)->name }}
          @endif
        </h1>
      </div>

      <div class="py-3">
        {{ $hosts->links() }}
      </div>

      <div class="block lg:hidden bg-gray-300 p-8">
        Your Advert Here!
      </div>

      <div class="bg-test-3 pt-6 lg:grid lg:grid-cols-4 lg:gap-x-8 xl:grid-cols-5">
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
            <div class="space-y-10 divide-y divide-gray-200">
              @livewire('city-combobox')
              <fieldset class="mt-6">
                <legend class="block text-sm font-medium text-gray-900">Categories</legend>
                <div class="space-y-3 pt-6">
                  @foreach($hostTypes as $hostType)
                    <div class="flex items-center">
                      <input
                        wire:model="selectedHostTypes"
                        value="{{ $hostType->id }}"
                        id="host-type-{{ $hostType->id }}"
                        type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500"
                      >
                      <label for="{{ $hostType->id }}" class="ml-3 text-sm text-gray-600">{{ $hostType->title }}</label>
                    </div>
                  @endforeach
                </div>
              </fieldset>
            </div>
          </div>
        </aside>

        <!-- Results -->
        <div class="bg-test-1 lg:col-span-2 xl:col-span-3">
          <ul role="list">
            @forelse($hosts as $host)
              <a href="#">
                <li class="bg-test-1 bg-white p-4 mt-2 shadow-md">
                  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-2 xl:grid-cols-4 gap-4">

                    <!-- Experience featured image -->
                    <div class="order-1 bg-test-3">
                      <img class="rounded-lg" src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=500">
                    </div>

                    <!-- Experience info -->
                    <div class="order-2 sm:order-3 md:order-2 lg:order-3 xl:order-2 sm:col-span-2 bg-test-2">
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
                    <div class="order-3 sm:order-2 md:order-3 lg:order-2 xl:order-3 bg-test-3 p-2 text-center flex">
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
                </li>
              </a>
            @empty
              <div class="bg-gray-200 text-gray-700">No results.</div>
            @endforelse
          </ul>
        </div>

        <aside class="bg-gray-300">
          Your Advert Here!
        </aside>
      </div>
    </main>
  </div>
</div>
