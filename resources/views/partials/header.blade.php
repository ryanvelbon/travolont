<header x-data="{ open: false }" class="bg-white shadow">
  <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-8">
    <div class="relative flex h-16 justify-between">
      <div class="relative z-10 flex px-2 lg:px-0">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        </div>
      </div>
      <div class="relative z-0 flex flex-1 items-center justify-center px-2 sm:absolute sm:inset-0">
        <div class="w-full sm:max-w-xs">
          <label for="search" class="sr-only">Search</label>
          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fa-regular fa-magnifying-glass text-gray-400"></i>
            </div>
            <input id="search" name="search" class="block w-full rounded-md border-0 bg-white py-1.5 pl-10 pr-3 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search" type="search">
          </div>
        </div>
      </div>
      <div class="relative z-10 flex items-center lg:hidden">
        <!-- Mobile menu button -->
        <button type="button" @click="open = !open" class="inline-flex items-center justify-center rounded-md h-8 w-8 p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open menu</span>
          <i x-show="!open" class="fa-light fa-bars fa-lg"></i>
          <i x-show="open" class="fa-light fa-xmark fa-lg"></i>
        </button>
      </div>
      <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
        @auth
        <button type="button" class="flex-shrink-0 rounded-full bg-white h-8 w-8 p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="sr-only">View notifications</span>
          <i class="fa-regular fa-bell fa-lg"></i>
        </button>

        <!-- Profile dropdown -->
        <div x-data="{ open: false }" class="relative ml-4 flex-shrink-0">
          <div>
            <button type="button" @click="open = !open" class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
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
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block px-4 py-2 text-sm text-gray-700">Sign out</button>
            </form>
          </div>
        </div>
        @else
          <div class="flex flex-1 items-center justify-end gap-x-6">
            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Log in</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</a>
            @endif
          </div>
        @endauth
      </div>
    </div>
    <nav class="hidden lg:flex lg:space-x-8 lg:py-2" aria-label="Global">
      <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
      <a href="#" class="bg-gray-100 text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium" aria-current="page">Link</a>
      <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Link</a>
      <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Link</a>
      <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 inline-flex items-center rounded-md py-2 px-3 text-sm font-medium">Link</a>
    </nav>
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
          <div class="text-base font-medium text-gray-800">Tom Cook</div>
          <div class="text-sm font-medium text-gray-500">tom@example.com</div>
        </div>
        <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-white w-8 h-8 p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="sr-only">View notifications</span>
          <i class="fa-regular fa-bell fa-lg"></i>
        </button>
      </div>
      <div class="mt-3 space-y-1 px-2">
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Your Profile</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Settings</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</button>
        </form>
      </div>
      @else
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 px-2">
        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="block px-3 py-2 text-sm font-medium uppercase text-center tracking-wide text-white bg-blue-500 hover:bg-blue-400">Register</a>
        @endif
        <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-medium uppercase text-center tracking-wide text-white bg-red-500 hover:bg-red-400">Log in</a>
      </div>
      @endauth
    </div>
  </nav>
</header>
