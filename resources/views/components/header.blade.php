<nav class="bg-white fixed top-0 left-0 w-full z-10 shadow-sm p-2">
  <div class="mx-auto max-w-7xl px-0.5 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between">
      <!-- Logo (always left-aligned) -->
      <div class="flex items-center">
        <a href="{{ route('/') }}">
          <img class="h-auto w-12 sm:w-10 lg:w-14" src="images/logo.png" alt="Your Company" />
        </a>
      </div>
      <!-- Hamburger menu button (centered on screens below 1024px) -->
      <div class="flex absolute inset-y-0 left-1/2 transform -translate-x-1/2 lg:hidden cursor-pointer">
        <button type="button"
          class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!-- Hamburger icon when menu is closed -->
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!-- Close icon when menu is open -->
          <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Notification icon and Profile icon (always right-aligned) -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 space-x-4">
        <div class="relative">
          <button onclick="toggleDropdown()" type="button"
            class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:outline-hidden">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full"
              src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt="User profile" />
          </button>
          <div
            class="hidden absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden"
            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu">
            <div style="font-size:0.711375rem" class="px-6 py-1"><span class="text-[#70657b]">admin</span></div>
            <a href="#" class="block px-4 py-2 text-sm text-[#47404f] cursor-pointer" role="menuitem" tabindex="-1"
              id="user-menu-item-0">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>