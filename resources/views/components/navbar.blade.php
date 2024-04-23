  <!-- Navbar -->
  <nav class="bg-blue-600 p-4 flex justify-between items-center sticky top-0 left-0 w-full z-20">
      <!-- Left side: Brand logo and searchbar -->
      <div class="flex items-center gap-4">
          <!-- Brand logo -->
          <a href="/" class="text-white text-xl font-bold">
              <img src="{{ asset('images/reg_brand_logo.png') }}" class="h-12" alt="Logo">
          </a>
          <!-- Searchbar -->
          <form action="{{ route('profile.search') }}" method="get">
              <input type="text" placeholder="Search...." name="search" id="search"
                  class="pl-4 pr-16 bg-blue-500 rounded-lg text-white focus:outline-none placeholder:text-white">
          </form>
      </div>
      <!-- Right side: Navigation items -->
      <div class="hidden md:flex items-center gap-8">
          <!-- Navigation items -->
          <a href="/feed" class="text-white hover:text-gray-300">
              <!-- Home section  -->
              <span
                  class="flex flex-col items-center justify-center py-2 px-3 text-white rounded md:bg-transparent md:p-0 hover:text-blue-100"
                  aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path
                          d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                      <path
                          d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                  </svg>
                  <span class="">Home</span>
              </span>
          </a>
          <!-- Friends section  -->
          <a href="/friends" class="text-white hover:text-gray-300">
              <span
                  class="flex flex-col items-center justify-center py-2 px-3 text-white rounded md:bg-transparent md:p-0 hover:text-blue-100"
                  aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd"
                          d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                          clip-rule="evenodd" />
                  </svg>
                  <span class="">Friends</span>
              </span>
          </a>
          <!-- Message section  -->
          <a href="/messages" class="text-white hover:text-gray-300">
              <span
                  class="flex flex-col items-center justify-center py-2 px-3 text-white rounded md:bg-transparent md:p-0 hover:text-blue-100"
                  aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd"
                          d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                          clip-rule="evenodd" />
                  </svg>
                  <span class="">Message</span>
              </span>
          </a>
          <!-- Notification section -->
          <a href="/notifications" class="text-white hover:text-gray-300">
              <span
                  class="flex flex-col items-center justify-center py-2 px-3 text-white rounded md:bg-transparent md:p-0 hover:text-blue-100"
                  aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path
                          d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                      <path fill-rule="evenodd"
                          d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z"
                          clip-rule="evenodd" />
                  </svg>
                  <span class="">Notifications</span>
              </span>
          </a>

          <button id="profileBtn" data-dropdown-toggle="dropdownOptions" class="text-white hover:text-gray-300">
              <div class="md:flex md:flex-col md:items-center" type="button">
                  <div class="md:flex md:flex-col md:items-center">
                      <!-- Image  -->
                      <img src="/storage/default/avatar.jpg" alt="Profile Picture"
                          class="rounded-full h-2 md:w-6 md:h-6">
                      <span
                          class="block text-white hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-100 md:p-0">Profile</span>
                  </div>
          </button>

          <!-- Dropdown menu -->
          <div id="dropdownOptions" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow">
              <div class="px-4 py-3 text-sm text-gray-900 flex gap-2 items-center">
                  <img src="/storage/default/avatar.jpg" alt="Profile Picture" class="rounded-full h-2 md:w-8 md:h-8">
                  <div>{{ Session::get('user_name') }}</div>
                  {{-- <div class="font-medium truncate">name@flowbite.com</div> --}}
              </div>
              <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                  <li>
                      <a href="/profile/home/{{ Session::get('token') }}" class="block px-4 py-2 hover:bg-gray-100">Your
                          Profile</a>
                  </li>
                  <li>
                      <a href="/settings/security-and-privacy/{{ Session::get('token') }}"
                          class="block px-4 py-2 hover:bg-gray-100">Settings
                          & Privacy</a>
                  </li>
                  <li>
                      <a href="/help-and-support" class="block px-4 py-2 hover:bg-gray-100">Help &
                          Support</a>
                  </li>
              </ul>
              <div class="py-2">
                  <a href="{{ route('auth.logout') }}"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                      out</a>
              </div>
          </div>

          <!-- Settings section -->
          <a href="/settings/general/{{ Session::get('token') }}" class="text-white hover:text-gray-300">
              <span
                  class="flex flex-col items-center justify-center py-2 px-3 text-white rounded md:bg-transparent md:p-0 hover:text-blue-100"
                  aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd"
                          d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                          clip-rule="evenodd" />
                  </svg>
                  <span class="">Settings</span>
              </span>
          </a>
      </div>
      <!-- Hamburger icon  -->
      <div class="md:hidden">
          <button id="menu-toggle" class="text-white focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                  <path fill-rule="evenodd"
                      d="M3 5a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0 6a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0 6a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1z" />
              </svg>
          </button>
      </div>
  </nav>
  <!-- Dropdown menu -->
  <div id="menu" class="md:hidden bg-blue-600 text-white absolute w-full right-0 top-20 z-50 hidden text-center">
      <a href="#" class="block px-4 py-2 hover:bg-gray-700">Home</a>
      <a href="#" class="block px-4 py-2 hover:bg-gray-700">Friends</a>
      <a href="#" class="block px-4 py-2 hover:bg-gray-700">Message</a>
      <a href="#" class="block px-4 py-2 hover:bg-gray-700">Notification</a>
      <a href="#" class="block px-4 py-2 hover:bg-gray-700">Prifile</a>
      <a href="#" class="block px-4 py-2 hover:bg-gray-700">Settings</a>
  </div>
  <!-- Navbar End  -->
