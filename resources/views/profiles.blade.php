@extends('layouts.main')
@push('title')
    <title>{{ $user['name'] }} | Alumni Junction</title>
@endpush
@section('main-section')

    {{-- checking if the visitor is the friend of the profile holder --}}
    {{-- initialization --}}
    @php
        $am_i_the_users_friend = false;
    @endphp
    @foreach ($user->toArray()['get_friends'] as $friend)
        {{-- filtering friend request cases --}}
        @if ($user['is_pending'] != '1')
            @if ($friend['friend_id'] == session()->get('user_id'))
                @php
                    $am_i_the_users_friend = true;
                @endphp
            @endif
        @endif
    @endforeach
    <div class="px-8 mx-auto pt-3 flex justify-center gap-10">
        <div class="w-3/4 pb-3">
            <div class="rounded-xl overflow-hidden relative mb-3">

                <img class="w-full h-40 object-cover" src="{{ asset('/storage/' . $user['cover_picture']) }}"
                    alt="background image" id="profile-cover">

                <img class="absolute top-16 left-8 z-10 w-32 aspect-square rounded-[50%] object-cover outline outline-white"
                    src="{{ asset('/storage/' . $user['profile_picture']) }}" alt="profile picture" id="profile-picture">

                <x-profilesection :details="$user" :friend="$friendStatus" />
            </div>
            <div class="rounded-xl overflow-hidden bg-white pb-4 pt-2">
                @if ($user['profile_visibility'] || $am_i_the_users_friend || $user['student_id'] == session()->get('user_id'))
                    <nav class="pl-12 mt-4 flex gap-4" id="default-styled-tab"
                        data-tabs-toggle="#default-styled-tab-content"
                        data-tabs-active-classes="bg-sky-200 hover:bg-lime-200 hover:border-green-500 border-cyan-500"
                        data-tabs-inactive-classes="bg-lime-200 border-green-500 hover:bg-sky-200 hover:border-cyan-500"
                        role="tablist">

                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="profile-styled-tab"
                            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">About</button>

                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="dashboard-styled-tab"
                            data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard"
                            aria-selected="false">Posts</button>

                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="settings-styled-tab"
                            data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings"
                            aria-selected="false">Images</button>

                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="contacts-styled-tab"
                            data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts"
                            aria-selected="false">Jobs</button>
                    </nav>
                @endif

                @if ($user['profile_visibility'] || $am_i_the_users_friend || $user['student_id'] == session()->get('user_id'))
                    <div id="default-styled-tab-content">
                        <div class="hidden" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                            <x-aboutprofile :details="$user" />
                        </div>
                        <div class="hidden" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <x-posts :details="$user" :posts="$posts" />
                        </div>
                        <div class="hidden" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                            <x-postgallery :details="$imgArr" />
                        </div>
                        <div class="hidden" id="styled-contacts" role="tabpanel" aria-labelledby="contacts-tab">
                            <x-jobposts :details="$user" :posts="$jobs" />
                        </div>
                    </div>
                @else
                    <x-privacy />
                @endif
            </div>
        </div>

        {{-- more peoples to follow section --}}
        <div class="w-1/4 rounded-xl h-fit bg-white px-4 py-3">

            {{-- adding common validation before showing the actual content --}}
            @if ($user['verified_at'] == null)
                <p class="text-red-600 text-center font-semibold my-2">Account is not verified yet</p>
            @elseif ($user['ban_acc'] != 0)
                <p class="text-red-600 text-center font-semibold my-2">Account has been banned by admin!</p>
            @elseif ($user['deleted_acc'] != 0)
                <p class="text-red-600 text-center font-semibold my-2">Account has been deleted by admin!</p>
            @else
                <h3 class="font-bold text-stone-700">More Peoples for You</h3>
                <div class="flex flex-col gap-3 items-center justify-center mt-2">

                    {{-- getting all the suggested people from the system --}}
                    @php
                        $no_suggested_people = false;
                    @endphp
                    @if (count($suggested_people) > 0)
                        @foreach ($suggested_people as $people)
                            <x-people :people="$people" />
                        @endforeach
                    @else
                        <p class="text-red-600 text-center font-semibold my-2">Nothing to show</p>
                        @php
                            $no_suggested_people = true;
                        @endphp
                    @endif
                </div>
                @if (!$no_suggested_people)
                    <div class="pt-3 px-4">
                        <a class="flex text-stone-600 hover:text-stone-900 text-sm" href="{{ route('friends') }}">
                            <span class="font-semibold">View all</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M9.47 15.28a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 1 0-1.06-1.06L10 13.69 6.28 9.97a.75.75 0 0 0-1.06 1.06l4.25 4.25ZM5.22 6.03l4.25 4.25a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 0 0-1.06-1.06L10 8.69 6.28 4.97a.75.75 0 0 0-1.06 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>

    @if ($user['student_id'] == session()->get('user_id'))
        <!-- only text or job post modal -->
        <div id="text_job_modal_profile_page" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between px-4 py-2 md:px-5 md:py-3 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Create New Post
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="text_job_modal_profile_page">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal tabs -->
                    <div class="flex items-center justify-center border-b rounded-t">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                            data-tabs-toggle="#default-styled-tab-content-profile-page"
                            data-tabs-active-classes="text-purple-600 hover:text-purple-600"
                            data-tabs-inactive-classes="border-transparent text-gray-500 hover:text-gray-600 text-gray-400 border-gray-100 hover:border-gray-300 border-gray-700 hover:text-gray-300"
                            role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="text-base inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                                    data-tabs-target="#styled-profile-page" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false">Post</button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="text-base inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                                    id="dashboard-styled-tab" data-tabs-target="#styled-dashboard-profile-page"
                                    type="button" role="tab" aria-controls="dashboard"
                                    aria-selected="false">Job</button>
                            </li>
                        </ul>
                    </div>
                    <!-- Modal body -->
                    <div class="px-4 md:px-5 md:py-3">
                        <div id="default-styled-tab-content-profile-page">

                            {{-- only text post --}}
                            <form action="{{ route('post.add') }}" method="POST" class="hidden rounded-lg bg-gray-50"
                                id="styled-profile-page" role="tabpanel" aria-labelledby="profile-tab">
                                @csrf
                                <div class="mt-2">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Share your
                                        thoughts</label>
                                    <textarea id="message" rows="4" name="post_description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Write your thoughts here..." required></textarea>
                                </div>
                                <div class="flex items-center mt-4">
                                    <input id="private_text" type="checkbox" value="0" name="visibility"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="private_text" class="ms-2 text-sm font-medium text-gray-900">Private
                                        ?</label>
                                </div>
                                <button type="submit"
                                    class="mt-6 w-full text-white text-md bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">
                                    Post
                                </button>
                            </form>

                            {{-- jop post area --}}
                            <form action="{{ route('post.addjob') }}" method="POST" class="hidden rounded-lg bg-gray-50"
                                id="styled-dashboard-profile-page" role="tabpanel" aria-labelledby="dashboard-tab">
                                @csrf
                                <input type="hidden" name="post_type" value="job">
                                <div>
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Post a
                                        job</label>
                                    <textarea id="description" rows="4" name="post_description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Write Job Description Here...." required></textarea>
                                    <p class="mt-2 text-xs text-gray-400"><span class="font-bold">Note: </span>Please do
                                        not
                                        enter the registration link in the description field. Enter the registration link in
                                        the
                                        link field.</p>
                                </div>
                                <div class="mt-3">
                                    <label for="website"
                                        class="block mb-2 text-sm font-medium text-gray-900">Registration
                                        Link</label>
                                    <input type="url" id="website" name="registration_link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Enter Registration Link" required />
                                </div>
                                <button type="submit"
                                    class="mt-6 w-full text-white text-md bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">
                                    Post
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- image post modal -->
        <div id="post_modal_profile_page" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">

                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">

                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-lg font-semibold text-gray-900 ">Create New Post</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="post_modal_profile_page">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{ route('post.add') }}" class="p-4 md:p-5" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="flex flex-col gap-4 mb-4">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full py-6 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to
                                                upload</span>
                                            or drag and drop</p>
                                        <p class="mb-2 text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX.
                                            800x400px)</p>
                                        <p class="text-xs text-gray-500 mb-2">(Multiple files are supported)</p>
                                        <p id="filenameshowbox" class="text-xs font-bold text-blue-600 px-10"></p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" name="post_image[]" multiple
                                        required />
                                </label>
                            </div>

                            <div class="">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                <textarea id="description" rows="2" name="post_description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write product description here"></textarea>
                            </div>
                            <div class="flex items-center me-4">
                                <input id="private_post" type="checkbox" value="0" name="visibility"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="private_post" class="ms-2 text-sm font-medium text-gray-900">Private ?</label>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <span class="mr-2">Post</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path
                                    d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            // add post modal open-close script here
            $("#post_modal_opener_profile_page").click(() => {
                $("#post_modal_opener_profile_page").blur();
                $("#text_or_job_post_btn_profile_page").click();
            });

            // tracking if files are selected for upload or not [if uploaded then show the uploaded file names into the label area]
            $('#dropzone-file').change(function() {
                if (this.files && this.files.length > 0) {
                    let filenames = [];
                    for (var i = 0; i < this.files.length; i++) {
                        filenames.push(this.files[i].name);
                    }
                    var files = filenames.join(', ');
                    // slicing the string if the length is bigger than 50
                    if (files.length > 34) {
                        files = files.slice(0, 30) + "....";
                    }
                    // adding the result into the dropbox area to show that the files are selected properly
                    $('#filenameshowbox').text("Selected files: " + files);
                }
            });

            // comment section toggle script here
            $("button[data-role=comment]").each((index, element) => {
                $(element).on('click', (e) => {
                    // getting the comment section div to unhide
                    let commentBox = $(element).attr("data-target-comment-section-toggle");
                    // getting the input area to autofocus
                    let commentInput = $(element).attr("data-focus-comment-input");

                    // toggling the comment section
                    $("#" + commentBox).toggleClass('hidden');

                    // focusing on the comment input box
                    if (!($("#" + commentBox).hasClass("hidden"))) {
                        $("#" + commentInput).focus();
                    }
                });
            });

            $("button[data-delete-filename]").each((index, element) => {

                $(element).on('click', (e) => {
                    const URL = $(element).attr("data-delete-filename");

                    // Display confirmation alert
                    displayConfirmationAlert('Are you sure?',
                        'Do you really want to delete this file?',
                        function() {
                            // Perform AJAX request to unfriend
                            $.ajax({
                                url: URL,
                                method: 'GET',
                                success: function(response) {
                                    // Handle the AJAX response here
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'File Successfully Deleted!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(function() {
                                        location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    // Handle errors
                                    let errors = JSON.parse(xhr.responseText);
                                    console.log(errors);

                                    // Handle the AJAX response here
                                    Swal.fire({
                                        icon: 'error',
                                        title: errors.message
                                    });
                                }
                            });
                        });
                });
            });

            $('#visibility_input').change(function() {
                var visibility = $(this).prop('checked') ? 1 : 0;
                $.ajax({
                    url: "{{ route('profile.visibility') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        profile_visibility: visibility
                    },
                    success: function(response) {
                        console.log(response.message);
                        location.reload();

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);

                    }
                });
            });

            // HANDLING FRIEND REQUEST SENDING
            $('a[data-send-link]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();

                    // getting the url
                    const URL = $(element).attr("data-send-link");

                    // Perform AJAX request to send friend request
                    $.ajax({
                        url: URL,
                        method: 'GET',
                        success: function(response) {

                            // Handle the AJAX response here
                            Swal.fire({
                                icon: 'success',
                                title: 'Friend request successfully sent!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            let errors = JSON.parse(xhr.responseText);

                            // Handle the AJAX response here
                            Swal.fire({
                                icon: 'error',
                                title: errors.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    });
                });
            });

            // Function to display confirmation alert
            function displayConfirmationAlert(title, text, successCallback) {
                Swal.fire({
                    title: title,
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        successCallback();
                    }
                });
            }
            // HANDLING REMOVING FRIEND
            $('a[data-remove-friend-link]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();

                    // getting the url
                    const URL = $(element).attr("data-remove-friend-link");

                    // Display confirmation alert
                    displayConfirmationAlert('Are you sure?',
                        'Do you really want to unfriend this user?',
                        function() {
                            // Perform AJAX request to unfriend
                            $.ajax({
                                url: URL,
                                method: 'GET',
                                success: function(response) {
                                    // Handle the AJAX response here
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Unfriend successful!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(function() {
                                        location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    // Handle errors
                                    let errors = JSON.parse(xhr.responseText);

                                    // Handle the AJAX response here
                                    Swal.fire({
                                        icon: 'error',
                                        title: errors.message,
                                        showConfirmButton: false,
                                        timer: 2000
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            });
                        });
                });
            });

            // REPORTING CONTENT
            $('a[data-report-link]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();

                    // getting the url
                    const URL = $(element).attr("data-report-link");

                    // Display confirmation alert
                    displayConfirmationAlert('Are you sure?',
                        'Do you really want to report this content?',
                        function() {
                            // Perform AJAX request to report content
                            $.ajax({
                                url: URL,
                                method: 'GET',
                                success: function(response) {
                                    // Handle the AJAX response here
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Content successfully reported!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                },
                                error: function(xhr, status, error) {
                                    // Handle errors
                                    let errors = JSON.parse(xhr.responseText);

                                    // Handle the AJAX response here
                                    Swal.fire({
                                        icon: 'error',
                                        title: errors.message,
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                }
                            });
                        });
                });
            });

            // HANDLING REMOVING FRIEND
            $('a[data-delete-post]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();

                    // getting the url
                    const URL = $(element).attr("data-delete-post");

                    // Perform AJAX request to send friend request
                    $.ajax({
                        url: URL,
                        method: 'GET',
                        success: function(response) {

                            // Handle the AJAX response here
                            Swal.fire({
                                icon: 'success',
                                title: 'Your post has been deleted successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            let errors = JSON.parse(xhr.responseText);

                            // Handle the AJAX response here
                            Swal.fire({
                                icon: 'error',
                                title: errors.message,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                });
            });
        });
    </script>
@endpush
