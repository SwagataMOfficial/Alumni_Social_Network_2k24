@extends('layouts.main')
@push('title')
    <title>Home | Alumni Junction</title>
@endpush

@section('main-section')

    <!-- only text or job post modal -->
    <div id="text_job_modal" tabindex="-1" aria-hidden="true"
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
                        data-modal-hide="text_job_modal">
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
                        data-tabs-toggle="#default-styled-tab-content"
                        data-tabs-active-classes="text-purple-600 hover:text-purple-600"
                        data-tabs-inactive-classes="border-transparent text-gray-500 hover:text-gray-600 text-gray-400 border-gray-100 hover:border-gray-300 border-gray-700 hover:text-gray-300"
                        role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="text-base inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                                data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Post</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="text-base inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                                id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">Job</button>
                        </li>
                    </ul>
                </div>
                <!-- Modal body -->
                <div class="px-3 md:px-5 py-2 md:py-3">
                    <div id="default-styled-tab-content">

                        {{-- only text post --}}
                        <form action="{{ route('post.add') }}" method="POST" class="hidden rounded-lg"
                            id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                <label for="private_text" class="ms-2 text-sm font-medium text-gray-900">Private ?</label>
                            </div>
                            <button type="submit"
                                class="mt-6 w-full text-white text-md bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">
                                Post
                            </button>
                        </form>

                        {{-- jop post area --}}
                        <form action="{{ route('post.addjob') }}" method="POST" class="hidden rounded-lg"
                            id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            @csrf
                            <input type="hidden" name="post_type" value="job">
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Post a
                                    job</label>
                                <textarea id="description" rows="4" name="post_description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write Job Description Here...." required></textarea>
                                <p class="mt-2 text-xs text-gray-400"><span class="font-bold">Note: </span>Please do not
                                    enter the registration link in the description field. Enter the registration link in the
                                    link field.</p>
                            </div>
                            <div class="mt-3">
                                <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Registration
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
    <div id="post_modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">

            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">

                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">Create New Post</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="post_modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="{{ route('post.add') }}" class="p-4 md:p-5" enctype="multipart/form-data" method="POST">
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
                                    <p class="text-xs text-gray-500 ">(Multiple files are supported)</p>
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="flex justify-center xl:justify-between mt-4 px-2 sm:px-10 w-full gap-10 xl:gap-4">
        <!-- First Div -->
        <div class="min-w-80 h-max sticky top-24 hidden xl:block">
            <div class="bg-cover bg-center bg-white rounded-lg">
                <div class="relative rounded-lg flex justify-center">
                    <!-- Cover image  -->
                    <img src="{{ asset('/storage/' . $user['cover_picture']) }}" alt="cover"
                        class="object-cover object-center rounded-lg h-28 w-full">
                    <a href="/profile/{{ $user['remember_token'] }}"
                        class="block w-28 aspect-square rounded-full absolute top-10 z-20 border-4 border-white">
                        <img src="{{ asset('/storage/' . $user['profile_picture']) }}" alt="Profile Picture"
                            class="w-full h-full rounded-[50%] object-cover object-center">
                    </a>
                </div>
                <!-- Texts -->
                <div class="text-center mt-12">
                    <p class="text-gray-700 font-bold text-2xl">{{ $user['name'] }}</p>
                    <p class="text-gray-500 text-md">{{ $user['about'] != null ? $user['about'] : '-- --' }}</p>
                </div>
                <hr class="mt-5">
                <!-- Friends counter -->
                <div class="pb-1">
                    <p class="my-2 ml-5 text-gray-400">All Friends</p>
                    <a href="{{ route('myfriends') }}"
                        class="px-2 rounded-lg mx-4 py-2 mb-3 text-lg flex items-center justify-between hover:bg-stone-200">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path
                                    d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
                            </svg>
                            <span>Friends</span>
                        </span>
                        <span class="text-sky-600 font-semibold text-md">{{ $user['friends'] }}</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Second Div -->
        <div class="h-max max-[768px]:w-full">

            <!-- post area  -->
            <div class="flex justify-center md:min-w-[70vw] lg:min-w-[50vw] xl:min-w-[45vw]">
                <div
                    class="flex items-center justify-center flex-col gap-3 md:flex-row p-4 bg-white rounded-2xl md:rounded-full w-full">
                    <div class="flex justify-around w-full">
                        <a href="/profile/{{ $user['remember_token'] }}"
                            class="rounded-[50%] bg-gray-300 h-12 w-12 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('/storage/' . $user['profile_picture']) }}" alt="image"
                                class="w-full h-full object-cover object-center">
                        </a>

                        <!-- Input box -->
                        <input type="text" name="post_description"
                            class="rounded-full border-gray-500 border h-12 focus:outline-none focus:ring-2 focus:ring-blue-500 w-[80%]"
                            placeholder="Add a post" id="post_modal_opener">
                    </div>
                    <!-- Icons -->
                    <div class="flex items-center justify-around w-full md:w-3/5">

                        <!-- three icons -->

                        <!-- text_job_modal toggle -->
                        <button data-modal-target="text_job_modal" data-modal-toggle="text_job_modal" type="button"
                            id="text_or_job_post_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 cursor-pointer hover:text-stone-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>

                        {{-- camera button --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 cursor-not-allowed text-stone-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                        </svg>

                        <!-- Modal toggle -->
                        <button data-modal-target="post_modal" data-modal-toggle="post_modal" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 cursor-pointer hover:text-stone-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mx-auto mt-4 lg:w-full">
                @if (count($posts) != 0)
                    @foreach ($posts as $index => $post)
                        <x-userpost :details="$post['get_user']" :likeduser="$post['get_liked_user']" :posts="$post" :comments="$post['get_comments']"
                            :key="$index" />
                    @endforeach
                @else
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-lg mx-auto mb-4">
                        <h1 class="text-red-600 font-semibold text-center py-5 text-2xl">No Posts Are Available</h1>
                    </div>
                @endif
            </div>
            <!-- s end  -->

        </div>

        <!-- Third Div -->
        <div class="h-max sticky w-full xl:max-w-[22vw] lg:max-w-[30vw] top-24 hidden lg:block">
            <div class="bg-white border rounded-lg shadow px-4 py-4">
                <h3 class="font-bold text-stone-700">More Peoples for You</h3>
                <div class="flex flex-col gap-3 items-center justify-center mt-2 bg-white px-2">

                    {{-- getting all the suggested people from the system --}}

                    {{-- getting all the suggested people from the system --}}
                    @php
                        $no_suggested_people = false;
                    @endphp
                    @if (count($suggested_people) > 0)
                        @foreach ($suggested_people as $people)
                            <div class="flex justify-between items-center gap-4 w-full">
                                <div class="flex gap-4">
                                    <a href="/profile/{{ $people['remember_token'] }}"
                                        class="w-12 border-2 border-stone-500 aspect-square rounded-[50%] overflow-hidden">
                                        <img class="w-full h-full object-cover object-center"
                                            src="{{ asset('/storage/' . $people['profile_picture']) }}"
                                            alt="profile image">
                                    </a>
                                    <div class="flex flex-col justify-center select-none">
                                        <p class="text-sm font-semibold text-stone-600">{{ $people['name'] }}</p>
                                        <p class="text-xs font-medium text-stone-500">
                                            {{-- Student at techno idnia hooghly --}}
                                            @if ($people['about'] != null)
                                                @if (strlen($people['about']) > 25)
                                                    {{ substr($people['about'], 0, 25) }}{{ '....' }}
                                                @else
                                                    {{ $people['about'] }}
                                                @endif
                                            @else
                                                {{ 'Not set' }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <a href="javascript:void(0);"
                                    data-send-link="{{ route('friend.request', ['token' => $people['remember_token']]) }}"
                                    class="flex items-center text-stone-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5 hover:cursor-pointer hover:text-stone-900">
                                        <path
                                            d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                    </svg>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p class="text-red-600 text-center font-semibold my-2">Nothing to show</p>
                        @php
                            $no_suggested_people = true;
                        @endphp
                    @endif
                </div>
                {{-- if there is no data to show then there will be no view all button --}}
                @if (!$no_suggested_people)
                    <div class="pt-3">
                        <a class="flex text-stone-600 hover:text-stone-900 text-sm" href="{{ route('friends') }}">
                            <span class="font-semibold">View all</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M9.47 15.28a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 1 0-1.06-1.06L10 13.69 6.28 9.97a.75.75 0 0 0-1.06 1.06l4.25 4.25ZM5.22 6.03l4.25 4.25a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 0 0-1.06-1.06L10 8.69 6.28 4.97a.75.75 0 0 0-1.06 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(() => {

            // add post modal open-close script here
            $("#post_modal_opener").click(() => {
                $("#post_modal_opener").blur();
                $("#text_or_job_post_btn").click();
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
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                });
            });

            // REPORTING CONTENT
            $('a[data-report-link]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();

                    // Display SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you really want to report this post?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, report it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user clicks "Yes, report it!", proceed with reporting

                            // getting the url
                            const URL = $(element).attr("data-report-link");

                            // Perform AJAX request to send friend request
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
                                    location.reload();
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
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            // If user clicks "No, cancel!", do nothing
                            Swal.fire({
                                title: 'Cancelled',
                                text: 'Report action cancelled :)',
                                icon: 'info',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                });
            });
        });
    </script>
@endpush
