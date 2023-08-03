<header x-data="{ open: false }" class="bg-primary-800 shadow">
  <div class="px-2 sm:px-4 lg:px-16">
    <div class="relative flex h-20 justify-between">
      <div class="relative z-10 flex px-2 lg:px-0">
        <div class="flex flex-shrink-0 items-center">
          <a href="{{ route('home') }}">
            <span class="text-2xl font-bold text-white">travolont</span>
          </a>
        </div>
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
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" fill="#fff" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M298.6 4c-6-5.3-15.1-5.3-21.2 0L5.4 244c-6.6 5.8-7.3 16-1.4 22.6s16 7.3 22.6 1.4L64 235V432c0 44.2 35.8 80 80 80H432c44.2 0 80-35.8 80-80V235l37.4 33c6.6 5.8 16.7 5.2 22.6-1.4s5.2-16.7-1.4-22.6L298.6 4zM96 432V206.7L288 37.3 480 206.7V432c0 26.5-21.5 48-48 48H368V320c0-17.7-14.3-32-32-32H240c-17.7 0-32 14.3-32 32V480H144c-26.5 0-48-21.5-48-48zm144 48V320h96V480H240z"/></svg>
            <span class="text-gray-300 text-xs pt-2">Dashboard</span>
          </a>
          <a href="#" class="flex flex-col justify-center items-center p-2 hover:bg-white/10 w-20">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" fill="#fff" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M112 0c8.8 0 16 7.2 16 16V64H320V16c0-8.8 7.2-16 16-16s16 7.2 16 16V64h32c35.3 0 64 28.7 64 64v32 32V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 160 128C0 92.7 28.7 64 64 64H96V16c0-8.8 7.2-16 16-16zM416 192H312v72H416V192zm0 104H312v80H416V296zm0 112H312v72h72c17.7 0 32-14.3 32-32V408zM280 376V296H168v80H280zM168 408v72H280V408H168zm-32-32V296H32v80H136zM32 408v40c0 17.7 14.3 32 32 32h72V408H32zm0-144H136V192H32v72zm136 0H280V192H168v72zM384 96H64c-17.7 0-32 14.3-32 32v32H416V128c0-17.7-14.3-32-32-32z"/></svg>
            <span class="text-gray-300 text-xs pt-2">Events</span>
          </a>
          <a href="#" class="flex flex-col justify-center items-center p-2 hover:bg-white/10 w-20">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" fill="#fff" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 96c-17.7 0-32 14.3-32 32v39.9L227.6 311.3c16.9 12.4 39.9 12.4 56.8 0L480 167.9V128c0-17.7-14.3-32-32-32H64zM32 207.6V384c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V207.6L303.3 337.1c-28.2 20.6-66.5 20.6-94.6 0L32 207.6zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
            <span class="text-gray-300 text-xs pt-2">Inbox</span>
          </a>
          <button type="button" class="flex flex-col justify-center items-center p-2 hover:bg-white/10 w-20">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" fill="#fff" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M208 16c0-8.8 7.2-16 16-16s16 7.2 16 16V32.8c80.9 8 144 76.2 144 159.2v29.1c0 43.7 17.4 85.6 48.3 116.6l2.8 2.8c8.3 8.3 13 19.6 13 31.3c0 24.5-19.8 44.3-44.3 44.3H44.3C19.8 416 0 396.2 0 371.7c0-11.7 4.7-23 13-31.3l2.8-2.8C46.6 306.7 64 264.8 64 221.1V192c0-83 63.1-151.2 144-159.2V16zm16 48C153.3 64 96 121.3 96 192v29.1c0 52.2-20.7 102.3-57.7 139.2L35.6 363c-2.3 2.3-3.6 5.4-3.6 8.7c0 6.8 5.5 12.3 12.3 12.3H403.7c6.8 0 12.3-5.5 12.3-12.3c0-3.3-1.3-6.4-3.6-8.7l-2.8-2.8c-36.9-36.9-57.7-87-57.7-139.2V192c0-70.7-57.3-128-128-128zM193.8 458.7c4.4 12.4 16.3 21.3 30.2 21.3s25.8-8.9 30.2-21.3c2.9-8.3 12.1-12.7 20.4-9.8s12.7 12.1 9.8 20.4C275.6 494.2 251.9 512 224 512s-51.6-17.8-60.4-42.7c-2.9-8.3 1.4-17.5 9.8-20.4s17.5 1.4 20.4 9.8z"/></svg>
            <span class="text-gray-300 text-xs pt-2">Notifications</span>
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
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700">Sign out</button>
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
    <div class="flex justify-center py-6">
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
