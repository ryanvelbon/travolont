<header x-data="{ open: false, showSearch: false }" class="bg-primary-700 shadow">
  <div class="px-2 sm:px-4 lg:px-16">
    <div class="relative flex h-16 justify-between">
      <div class="relative z-10 flex px-2 lg:px-0">
        <div class="flex flex-shrink-0 items-center">
          <a href="{{ route('home') }}" class="flex gap-4">
            <x-logo class="w-auto h-8 mx-auto text-primary-100" />
            <span class="text-2xl font-bold text-white">travolont</span>
          </a>
        </div>
      </div>
      <div class="relative z-0 flex flex-1 items-center justify-center px-2 sm:absolute sm:inset-0">
        <button
          x-show="!showSearch"
          @click="showSearch = true"
          type="button"
          class="w-full sm:max-w-xs flex justify-start items-center block rounded-md border-0 bg-white/30 py-1.5 pl-10 pr-3 text-gray-100 sm:text-sm sm:leading-6"
        >
          <i class="fa-light fa-magnifying-glass fa-lg"></i>
          <span class="ml-3">Search</span>
        </button>
        <button
          x-show="showSearch"
          @click="showSearch = false"
          type="button"
          class="text-gray-100 bg-white/10 w-12 h-12 p-2 rounded-full"
        >
          <i class="fa-light fa-magnifying-glass fa-lg"></i>
        </button>
      </div>
      <div class="relative z-10 flex items-center lg:hidden">
        <!-- Mobile menu button -->
        <button type="button" @click="open = !open" class="inline-flex items-center justify-center rounded-md h-8 w-8 p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open menu</span>
          <i x-show="!open" class="fa-light fa-bars fa-lg"></i>
          <i x-show="open" class="fa-light fa-xmark fa-lg"></i>
        </button>
      </div>
      <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center lg:gap-x-1">
        @auth
          <a href="#" class="flex flex-col justify-center items-center p-2 hover:bg-white/10 w-20">
            <span class="text-3xl">🏡</span>
            <span class="text-gray-100 text-xs">Dashboard</span>
          </a>
          <div x-data="{ open: false }" class="relative">
            <button
              @click="open = !open"
              class="flex flex-col justify-center items-center p-2 hover:bg-white/10 w-20"
            >
              <span class="text-3xl">🗓</span>
              <span class="text-gray-100 text-xs">Calendar</span>
            </button>

            <!-- Dropdown menu, show/hide based on menu state -->
            <div
              x-show="open"
              @click.away="open = false"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
            >
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">
                <i class="fa-solid fa-calendar mr-2"></i>
                <span>My Calendar</span>
              </a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">
                <i class="fa-solid fa-plane mr-2"></i>
                <span>Make a Trip</span>
              </a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">
                <i class="fa-solid fa-party-horn mr-2"></i>
                <span>Organize an Event</span>
              </a>
            </div>
          </div>
          <a href="#" class="flex flex-col justify-center items-center p-2 hover:bg-white/10 w-20">
            <span class="text-3xl">✉</span>
            <span class="text-gray-100 text-xs">Inbox</span>
          </a>
          <button type="button" class="flex flex-col justify-center items-center p-2 hover:bg-white/10 w-20">
            <span class="text-3xl">🔔</span>
            <span class="text-gray-100 text-xs">Notifications</span>
          </button>

          <!-- Profile dropdown -->
          <div x-data="{ open: false }" class="relative ml-4 flex-shrink-0">
            <div>
              <button type="button" @click="open = !open" class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-12 w-12 rounded-full" src="{{ auth()->user()->avatarUrl() }}" alt="">
              </button>
            </div>

            <!-- Dropdown menu, show/hide based on menu state. -->
            <div
              x-show="open"
              @click.away="open = false"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
            >
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-0">
                <i class="fa-solid fa-user mr-2"></i>
                <span>Your Profile</span>
              </a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" id="user-menu-item-1">
                <i class="fa-solid fa-gears mr-2"></i>
                <span>Settings</span>
              </a>
              <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">
                  <i class="fa-solid fa-right-from-bracket mr-2"></i>
                  <span>Sign out</span>
                </button>
              </form>
            </div>
          </div>
        @else
          <div class="flex flex-1 items-center justify-end gap-x-6">
            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-white">Log in</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Register</a>
            @endif
          </div>
        @endauth
      </div>
    </div>
    <div x-show="showSearch" class="flex justify-center py-6">
      <form class="bg-white/20 rounded-md p-2 sm:flex">
        <select class="text-lg w-full sm:rounded-l-lg">
          <option>Find Hosts</option>
          <option>Find Travelers</option>
        </select>
        <input type="date" name="" class="w-full">
        <input type="date" name="" class="w-full">
        <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white px-4 py-4 sm:rounded-r-lg">Search</button>
      </form>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <nav x-show="open" class="lg:hidden" aria-label="Global" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
      <a href="#" class="bg-gray-100 text-gray-900 block rounded-md py-2 px-3 text-base font-medium" aria-current="page">Link</a>
      <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Link</a>
      <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Link</a>
      <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Link</a>
    </div>
    <div class="border-t border-gray-200 pb-3 pt-4">
      @auth
        <div class="flex items-center px-4">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium text-gray-800">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
            <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
          </div>
          <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-white w-8 h-8 p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
            <span class="sr-only">View notifications</span>
            <i class="fa-regular fa-bell fa-lg"></i>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="{{ route('profile.edit') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Your Profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Settings</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</button>
          </form>
        </div>
      @else
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 px-2">
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="block px-3 py-2 text-sm font-medium uppercase text-center tracking-wide text-white bg-primary-500 hover:bg-primary-400">Register</a>
          @endif
          <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-medium uppercase text-center tracking-wide text-gray-900 bg-primary-100 hover:bg-primary-200">Log in</a>
        </div>
      @endauth
    </div>
  </nav>
</header>
