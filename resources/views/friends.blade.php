@extends('layouts.main')
@push('title')
    <title>Home | Alumni Junction</title>
@endpush
@section('main-section')
    {{-- background gray container --}}
    {{-- <div class="container bg-gray-200 min-h-[calc(100vh-67px)]"> --}}
    <div class="container">
        {{-- max-width container with left,right space --}}
        <div class="px-8 mx-auto pt-3 flex justify-center gap-10">

            {{-- left navigation panel --}}
            <div class="w-1/4 rounded-xl h-fit bg-white px-4 py-4">
                <h1 class="text-stone-700 font-semibold text-2xl mb-2 ml-1">My connections</h1>
                <div class="flex flex-col items-start justify-center">
                    <a href="#"
                        class="px-2 rounded-lg w-full py-2 text-lg flex items-center justify-between hover:bg-stone-200">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
                            </svg>
                            <span>Friends</span>
                        </span>
                        <span class="text-sky-600 font-semibold text-md">{{ $user['followers'] }}</span>
                    </a>
                    {{-- <a href="#"
                        class="px-2 rounded-lg w-full py-2 text-lg flex items-center justify-between hover:bg-stone-200">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                            </svg>

                            <span>Groups</span>
                        </span>
                        <span class="text-sky-600 font-semibold text-md">5</span>
                    </a> --}}
                    {{-- <a href="#"
                        class="px-2 rounded-lg w-full py-2 text-lg flex items-center justify-between hover:bg-stone-200">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M10.75 16.82A7.462 7.462 0 0 1 15 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0 0 18 15.06v-11a.75.75 0 0 0-.546-.721A9.006 9.006 0 0 0 15 3a8.963 8.963 0 0 0-4.25 1.065V16.82ZM9.25 4.065A8.963 8.963 0 0 0 5 3c-.85 0-1.673.118-2.454.339A.75.75 0 0 0 2 4.06v11a.75.75 0 0 0 .954.721A7.506 7.506 0 0 1 5 15.5c1.579 0 3.042.487 4.25 1.32V4.065Z" />
                            </svg>

                            <span>My contacts</span>
                        </span>
                        <span class="text-sky-600 font-semibold text-md">8</span>
                    </a> --}}
                    <a href="#"
                        class="px-2 rounded-lg w-full py-2 text-lg flex items-center gap-2 hover:bg-stone-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>My favourites</span>
                    </a>
                </div>
            </div>
            {{-- right main settings option --}}
            <div class="w-3/4 flex flex-col gap-3 mb-3">
                <section class="rounded-xl overflow-hidden bg-white px-6 py-4">
                    <h1 class="text-stone-700 font-semibold text-2xl mb-2">Pending requests</h3>

                        {{-- displaying all pending friend requests --}}
                        @if (count($p_requests) > 0)
                            {{-- temporary loop --}}
                            @foreach ($p_requests as $user)
                                {{-- pending request peoples will appear here --}}
                                <div class="flex items-center justify-between mb-3 px-4">
                                    <div class="flex justify-center items-center gap-4">
                                        <a href="/profile/home/{{ $user['remember_token'] }}" class="">
                                            <img src="/storage/default/avatar.jpg" alt="profile image"
                                                class="w-14 object-cover aspect-square rounded-[50%] border-2 border-slate-800">
                                        </a>
                                        <div class="flex flex-col">
                                            <span class="text-xl font-bold">{{ $user['name'] }}</span>
                                            <span class="text-md">{{ $user['bio'] }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        {{-- <button
                                            class="px-4 py-2 font-semibold rounded-xl bg-red-300 border-[3px] border-red-700 hover:bg-red-400">Ignore</button> --}}
                                        <button
                                            class="p-1 font-semibold rounded-xl bg-red-300 border-[3px] border-red-700 hover:bg-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        {{-- <button
                                            class="px-4 py-2 font-semibold rounded-xl bg-lime-300 border-[3px] border-lime-700 hover:bg-lime-400">Accept</button> --}}
                                        <button
                                            class="p-1 font-semibold rounded-xl bg-cyan-300 border-[3px] border-cyan-700 hover:bg-cyan-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5">
                                                <path
                                                    d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-lg mx-2">No pending requests found!</p>
                        @endif
                </section>
                <section class="rounded-xl overflow-hidden bg-white px-6 py-4">
                    <h1 class="text-stone-700 font-semibold text-2xl mb-4">Suggested people</h3>

                        {{-- suggested people cards will appear here --}}
                        <div class="grid grid-cols-4 gap-2">
                            {{-- cards --}}
                            {{-- @for ($i = 1; $i <= 10; $i++) --}}
                            @foreach ($s_peoples as $people)
                                <div
                                    class="rounded-xl bg-slate-200 overflow-hidden relative flex flex-col justify-start items-center">
                                    <img src="/storage/default/cover.png" alt="cover photo"
                                        class="object-cover max-h-16 w-full">
                                    <a href="/profile/home/{{ $people['remember_token'] }}"
                                        class="absolute top-7 w-20 aspect-square object-cover rounded-[50%] border-2 border-slate-600 overflow-hidden">
                                        <img src="/storage/default/avatar.jpg" alt="profile photo" class="w-full h-full">
                                    </a>
                                    <p class="mt-12 font-semibold text-xl">{{ $people['name'] }}</p>
                                    <p class="text-md py-1">Passout year - {{ $people['graduation_year'] }}</p>
                                    <button
                                        class="text-sm px-3 py-2 mt-1 rounded-xl bg-indigo-500 hover:bg-indigo-600 border-[3px] border-indigo-900 mb-3 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                            {{-- @endfor --}}
                            {{-- @for ($i = 1; $i <= 10; $i++)
                                <div
                                    class="rounded-xl bg-gray-300 overflow-hidden relative flex flex-col justify-start items-center">
                                    <img src="/storage/cover.jpg" alt="cover photo" class="object-cover max-h-16 w-full">
                                    <img src="/storage/profile.jpg" alt="profile photo"
                                        class="absolute top-7 w-20 aspect-square object-cover rounded-[50%] border-2 border-slate-600">
                                    <p class="mt-12 font-semibold text-xl px-4">Swagata Mukherjee</p>
                                    <p class="text-md py-1">Passout year - 2024</p>
                                    <button
                                        class="text-sm px-4 py-1 mt-1 rounded-xl bg-indigo-500 hover:bg-indigo-600 border-[3px] border-indigo-900 mb-3 text-white">Add
                                        Friend</button>
                                    <button
                                        class="text-sm px-3 py-2 mt-1 rounded-xl bg-indigo-500 hover:bg-indigo-600 border-[3px] border-indigo-900 mb-3 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                        </svg>
                                    </button>
                                </div>
                            @endfor --}}

                        </div>
                </section>
            </div>
        </div>
    </div>
@endsection
