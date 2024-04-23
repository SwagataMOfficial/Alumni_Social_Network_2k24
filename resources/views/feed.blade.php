@extends('layouts.main')
@push('title')
    <title>Home | Alumni Junction</title>
@endpush

@section('main-section')
    <!-- Main modal -->
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
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                        or drag and drop</p>
                                    <p class="mb-2 text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                    <p class="text-xs text-gray-500 ">(Multiple files are supported)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" name="post_image[]" multiple />
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
                            <input id="private_post" type="radio" value="0" name="visibility"
                                class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 focus:ring-orange-500">
                            <label for="private_post" class="ms-2 text-sm font-medium text-gray-900">Private</label>
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

    {{-- main modal --}}
    <div class="flex flex-wrap justify-center mt-4">
        <!-- Left Side Profile Section  -->
        <!-- First Div -->
        <div class="w-full md:w-1/3 lg:w-1/3 px-4">
            <div class="bg-cover bg-center md:w-80 lg:w-96 bg-white rounded-lg fixed left-8 top-24">
                <div class="absolute inset-x-0 top-10 flex justify-center pt-4">
                    <div class="bg-white rounded-full border-4 border-white">
                        <!-- Profile Image  -->
                        <a href="/profile/home/{{ $user['remember_token'] }}"
                            class="block overflow-hidden md:h-16 md:w-16 lg:h-28 lg:w-28 rounded-full aspect-square">
                            <img src="{{ asset('/storage/' . $user['profile_picture']) }}" alt="Profile Picture"
                                class="w-full h-full rounded-[50%] object-cover">
                        </a>
                    </div>
                </div>
                <div class="md:h-36 overflow-hidden rounded-lg">
                    <!-- Cover image  -->
                    <img src="{{ asset('/storage/' . $user['cover_picture']) }}" alt="cover" class="object-cover">
                </div>
                <!-- Texts -->
                <div class="text-center mt-10">
                    <p class="text-gray-700 font-bold text-2xl">{{ $user['name'] }}</p>
                    <p class="text-gray-500 text-md">{{ $user['about'] }}</p>
                </div>
                <hr class="mt-5">
                <!-- Friends counter -->
                <div>
                    <p class="mt-2 ml-5 text-gray-400">All Friends</p>
                    <div class="flex ml-5 justify-between mt-3">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
                            </svg>
                            <p class="text-gray-500">Friends</p>
                        </div>
                        <div>
                            <p class="text-blue-500 font-bold mr-5">{{ $user['followers'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-b-lg mt-5">
                    <hr class="mt-2 mb-4">
                    <div class="ml-5 mt-2 flex items-center">
                        <a href="#" class="flex items-center hover:text-stone-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 mb-3">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2 mb-3">My Favorites</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Second Div -->
        <div class="w-full md:w-1/3 lg:w-1/3 z-10">
            <!-- s start  -->
            <div class="flex justify-center">
                <div class="inline-flex items-center justify-center p-4 bg-white rounded-full">
                    <!-- Profile picture -->
                    <a href="/profile/home/{{ $user['remember_token'] }}"
                        class="rounded-full bg-gray-300 h-12 w-12 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('/storage/' . $user['profile_picture']) }}" alt="image"
                            class="w-full h-full object-cover">
                    </a>

                    <!-- Input box -->
                    <form action="{{ route('post.add') }}" method="post" id="post_form">
                        @csrf
                        <input type="text" name="post_description"
                            class="rounded-full border-gray-500 border h-12 pl-6 pr-14 ml-4 mr-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Add a post" required>
                    </form>

                    <!-- Icons -->
                    <div class="ml-4 flex items-center space-x-14 mr-4">

                        <!-- three icons -->

                        {{-- pen icon --}}
                        <button type="submit" form="post_form" id="no_image_form_btn">
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

            <div class="container mx-auto mt-4 lg:w-full">
                @foreach ($posts as $post)
                    <x-userpost :details="$post['get_user']" :posts="$post" />
                @endforeach
            </div>
            <!-- s end  -->
        </div>

        <!-- Third Div -->
        <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3">
            <a href="#"
                class="fixed top-24 right-8 block max-w-sm px-6 pt-2 pb-4 bg-white border rounded-lg shadow w-96">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-500">Job Alerts</h5>
                <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside">
                    <li>
                        <span class="font-semibold text-gray-600">Company wants to hire!</span>
                        <p class="text-sm text-gray-500">1 day ago</p>
                    </li>
                    <li>
                        <span class="font-semibold text-gray-600">Company wants to hire!</span>
                        <p class="text-sm text-gray-500">1 day ago</p>
                    </li>
                    <li>
                        <span class="font-semibold text-gray-600">Company wants to hire!</span>
                        <p class="text-sm text-gray-500">1 day ago</p>
                    </li>
                    <li>
                        <span class="font-semibold text-gray-600">Company wants to hire!</span>
                        <p class="text-sm text-gray-500">1 day ago</p>
                    </li>
                </ul>
            </a>

            <a href="#"
                class="fixed top-96 right-8 block max-w-sm px-6 pt-2 pb-4 bg-white border rounded-lg shadow w-96">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-500">Chats</h5>
                <div class="flex ml-5 justify-between mt-3">
                    <div>
                        <p class="text-gray-500">Person 1</p>
                    </div>
                    <div>
                        <p class="text-blue-500 font-bold mr-5">5</p>
                    </div>
                </div>

                <div class="flex ml-5 justify-between mt-3">
                    <div>
                        <p class="text-gray-500">Person 2</p>
                    </div>
                    <div>
                        <p class="text-blue-500 font-bold mr-5">3</p>
                    </div>
                </div>

                <div class="flex ml-5 justify-between mt-3">
                    <div>
                        <p class="text-gray-500">Person 3</p>
                    </div>
                    <div>
                        <p class="text-blue-500 font-bold mr-5">1</p>
                    </div>
                </div>
            </a>

        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("menu").classList.toggle("hidden");
        });
    </script>

    <script>
        Array.from(document.querySelectorAll('like_btns')).forEach((e) => {
            id = e.id;
            e.addEventListener("click", function() {
                console.log('like btn clicked with ' + id);
            });
        });
    </script>
@endpush
