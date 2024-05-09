  <!-- Navbar -->
  <nav class="bg-blue-600 p-4 flex justify-between items-center sticky top-0 left-0 w-full z-50">
      <!-- Left side: Brand logo and searchbar -->
      <div class="flex items-center gap-4">
          <!-- Brand logo -->
          <a href="/feed" class="text-white text-xl font-bold">
              <img src="{{ asset('images/reg_brand_logo.png') }}" class="h-12" alt="Logo">
          </a>
          <!-- Searchbar -->
          <form action="{{ route('profile.search') }}" method="get" class="hidden min-[600px]:block">
              <input type="text" required placeholder="Search by name or ID .." name="search" id="search"
                  class="pl-4 pr-16 bg-blue-500 rounded-lg text-white focus:outline-none placeholder:text-white focus:ring-2 focus:ring-white">
          </form>
      </div>
      <!-- Right side: Navigation items -->
      <div class="hidden lg:flex items-center gap-6 xl:gap-8">
          <!-- Navigation items -->
          <!-- Home section  -->
          <a href="{{route('feed')}}" class="text-white hover:text-gray-300 focus:outline-none">
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
          <!-- jpb section  -->
          <a href="{{route('jobs')}}" class="text-white hover:text-gray-300 focus:outline-none">
              <span
                  class="flex flex-col items-center justify-center py-2 px-3 text-white rounded md:bg-transparent md:p-0 hover:text-blue-100"
                  aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                    <path d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                  </svg>                  
                  <span class="">Get jobs</span>
              </span>
          </a>
          <!-- Friends section  -->
          <a href="{{route('friends')}}" class="text-white hover:text-gray-300 focus:outline-none">
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
          <a href="{{route('messages')}}" class="text-white hover:text-gray-300 focus:outline-none">
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
          <a href="{{route('notifications')}}" class="text-white hover:text-gray-300 focus:outline-none">
              <span
                  class="relative flex flex-col items-center justify-center py-2 px-3 text-white rounded md:bg-transparent md:p-0 hover:text-blue-100"
                  aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path
                          d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                      <path fill-rule="evenodd"
                          d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z"
                          clip-rule="evenodd" />
                  </svg>
                  <!-- Red dot for notifications -->
                  <span class="absolute top-0 right-0 h-3 w-3 bg-red-500 rounded-full notification-dot hidden"></span>
                  <span class="">Notifications</span>
              </span>
          </a>

          <button id="profileBtn" data-dropdown-toggle="dropdownOptions"
              class="text-white hover:text-gray-300 focus:outline-none">
              <div class="md:flex md:flex-col md:items-center" type="button">
                  <div class="md:flex md:flex-col md:items-center">
                      <!-- Image  -->
                      <img src="{{ asset('/storage/' . session()->get('user_profile_img')) }}" alt="Profile Picture"
                          class="rounded-full h-2 md:w-6 md:h-6">
                      <span
                          class="block text-white hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-100 md:p-0">Profile</span>
                  </div>
          </button>

          <!-- Dropdown menu -->
          <div id="dropdownOptions" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow">
              <div class="px-4 py-3 text-sm text-gray-900 flex gap-2 items-center">
                  <img src="{{ asset('/storage/' . session()->get('user_profile_img')) }}" alt="Profile Picture"
                      class="rounded-full h-2 md:w-8 md:h-8">
                  <div>{{ Session::get('user_name') }}</div>
              </div>
              <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                  <li>
                      <a href="{{url('/')}}/profile/{{ Session::get('token') }}" class="block px-4 py-2 hover:bg-gray-100">Your
                          Profile</a>
                  </li>
                  <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-100" id="openSupportModal">Help &
                          Support</a>
                  </li>
              </ul>
              <div class="py-2">
                  <a href="{{ route('auth.logout') }}"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
              </div>
          </div>
          <!-- Support Modal -->
          <div id="supportModal" class="modal hidden fixed inset-0 z-50 overflow-auto bg-gray-900 bg-opacity-50">
              <div class="modal-content bg-white w-96 mx-auto mt-20 p-6 rounded shadow-lg">
                  <span class="close absolute top-0 right-0 cursor-pointer text-3xl">&times;</span>
                  <h1 class="text-lg font-semibold mb-4">Help & Support</h1>
                  <form id="supportForm">
                      @csrf
                      <input type="hidden" id="studentId" value="{{ session()->get('user_id') }}">
                      <textarea id="query" class="w-full h-24 border rounded-lg px-3 py-2 mb-4" placeholder="Enter your query"></textarea>
                      <button type="submit"
                          class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
                      <button type="button"
                          class="close-button bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-4">Close</button>
                  </form>
              </div>
          </div>
          <!-- Settings section -->
          <a href="{{route('settings')}}" class="text-white hover:text-gray-300 focus:outline-none">
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
      <div class="lg:hidden">
          <button id="menu-toggle" class="text-white focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6">
                  <path fill-rule="evenodd"
                      d="M3 5a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0 6a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0 6a1 1 0 0 1 1-1h12a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1z" />
              </svg>
          </button>
      </div>
  </nav>
  <!-- Dropdown menu -->
  <div id="menu" class="lg:hidden bg-blue-600 text-white absolute w-full right-0 top-20 z-50 hidden text-center">
      <!-- Searchbar -->
      <form action="{{ route('profile.search') }}" method="get"
          class="w-full flex max-[425px]:flex-col justify-center items-center gap-2 min-[600px]:hidden">
          <input type="text" required placeholder="Search by name or ID .." name="search" id="search_res"
              class="pl-4 pr-20 bg-blue-500 rounded-lg text-white focus:outline-none placeholder:text-white focus:ring-2 focus:ring-white w-9/12">
          <button type="submit"
              class="px-4 py-2 bg-gray-500 rounded-lg hover:bg-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-800">Search</button>
      </form>
      <a href="{{ route('feed') }}" class="block px-4 py-2 max-[600px]:mt-2 hover:bg-blue-700">Home</a>
      <a href="{{ route('jobs') }}" class="block px-4 py-2 hover:bg-blue-700">Get jobs</a>
      <a href="{{ route('friends') }}" class="block px-4 py-2 hover:bg-blue-700">Friends</a>
      <a href="{{ route('messages') }}" class="block px-4 py-2 hover:bg-blue-700">Message</a>
      <a href="{{ route('notifications') }}" class="block px-4 py-2 hover:bg-blue-700">Notification</a>
      <a href="{{ url('/') }}/profile/{{ session()->get('token') }}"
          class="block px-4 py-2 hover:bg-blue-700">Profile</a>
      <a href="{{ route('settings') }}" class="block px-4 py-2 hover:bg-blue-700">Settings</a>
  </div>
  <!-- Navbar End  -->

  @push('script')
      <script>
          $(document).ready(function() {

              // hamburger toggle button
              document.getElementById("menu-toggle").addEventListener("click", function() {
                  document.getElementById("menu").classList.toggle("hidden");
              });

              $('#openSupportModal').click(function() {
                  $('#supportModal').removeClass('hidden');
              });


              $('.close-button').click(function() {
                  $('#supportModal').addClass('hidden');
              });
              // Submit Form
              $('#supportForm').submit(function(e) {
                  e.preventDefault(); // Prevent default form submission
                  var studentId = $('#studentId').val();
                  var query = $('#query').val();

                  $.ajax({
                      url: "{{ route('user.support') }}",
                      type: 'POST',
                      data: {
                          student_id: studentId,
                          query: query,
                          _token: "{{ csrf_token() }}",
                      },
                      success: function(response) {
                          // Display success message using SweetAlert
                          // Display success message using SweetAlert
                          Swal.fire({
                              title: "Success",
                              text: "Query submitted successfully!",
                              icon: "success",
                              confirmButtonText: "OK",
                          }).then(function() {
                              $('#supportForm')[0].reset();
                              $('#supportModal').addClass('hidden');
                          });
                      },
                      error: function(xhr, status, error) {
                          // Display error message using SweetAlert
                          Swal.fire({
                              title: "Error",
                              text: "Error occurred while submitting query!",
                              icon: "error",
                              confirmButtonText: "OK",
                          });
                          console.error(xhr.responseText);
                      }
                  });
              });

              function updateNotificationDot() {
                  $.ajax({
                      url: "http://127.0.0.1:8000/notification/check-new",
                      method: 'GET',
                      success: function(response) {
                          if (response.newNotifications) {
                              // Show the red dot if there are new notifications
                              $('.notification-dot').removeClass('hidden');
                          } else {
                              // Hide the red dot if there are no new notifications
                              $('.notification-dot').addClass('hidden');
                          }
                      },
                      error: function(xhr, status, error) {
                          // Handle errors
                          console.error(xhr.responseText);
                      }
                  });
              }

              // Call the function to initially check for new notifications
              updateNotificationDot();

              // Set a timer to periodically check for new notifications
              setInterval(updateNotificationDot, 60000);
          });
      </script>
  @endpush
