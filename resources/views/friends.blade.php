@extends('layouts.main')
@push('title')
    <title>Friends | Alumni Junction</title>
@endpush
@section('main-section')
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
                        <span class="text-sky-600 font-semibold text-md">{{ $user['friends'] }}</span>
                    </a>
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
                            @foreach ($p_requests as $frequest)
                                {{-- pending request peoples will appear here --}}
                                <div class="flex items-center justify-between mb-3 px-4">
                                    <div class="flex justify-center items-center gap-4">
                                        <a href="/profile/{{ $frequest['get_student']['remember_token'] }}" class="">
                                            <img src="/storage/default/avatar.jpg" alt="profile image"
                                                class="w-14 object-cover aspect-square rounded-[50%] border-2 border-slate-800">
                                        </a>
                                        <div class="flex flex-col">
                                            <span class="text-xl font-bold">{{ $frequest['get_student']['name'] }}</span>
                                            <span class="text-md">{{ $frequest['get_student']['about'] }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        {{-- <button
                                            class="px-4 py-2 font-semibold rounded-xl bg-red-300 border-[3px] border-red-700 hover:bg-red-400">Ignore</button> --}}
                                        <a href="{{ route('friend.reject', ['token' => $frequest['get_student']['remember_token'], 'id' => $frequest['id']]) }}"
                                            class="p-1 font-semibold rounded-xl bg-red-300 border-[3px] border-red-700 hover:bg-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        {{-- <button
                                            class="px-4 py-2 font-semibold rounded-xl bg-lime-300 border-[3px] border-lime-700 hover:bg-lime-400">Accept</button> --}}
                                        <a href="{{ route('friend.accept', ['token' => $frequest['get_student']['remember_token'], 'id' => $frequest['id']]) }}"
                                            class="p-1 font-semibold rounded-xl bg-cyan-300 border-[3px] border-cyan-700 hover:bg-cyan-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5">
                                                <path
                                                    d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-lg mx-2 text-blue-500">No pending requests found!</p>
                        @endif
                </section>
                <section class="rounded-xl overflow-hidden bg-white px-6 py-4">
                    <h1 class="text-stone-700 font-semibold text-2xl mb-4">Suggested people</h3>

                        {{-- suggested people cards will appear here --}}
                        @if (count($s_peoples) > 0)
                            <div class="grid grid-cols-4 gap-2">
                                {{-- cards --}}
                                @foreach ($s_peoples as $people)
                                    <div
                                        class="rounded-xl bg-slate-200 overflow-hidden relative flex flex-col justify-start items-center">
                                        <img src="/storage/default/cover.png" alt="cover photo"
                                            class="object-cover max-h-16 w-full">
                                        <a href="/profile/{{ $people['remember_token'] }}"
                                            class="absolute top-7 w-20 aspect-square object-cover rounded-[50%] border-2 border-slate-600 overflow-hidden">
                                            <img src="/storage/default/avatar.jpg" alt="profile photo"
                                                class="w-full h-full">
                                        </a>
                                        <p class="mt-12 font-semibold text-xl">{{ $people['name'] }}</p>
                                        <p class="text-md py-1">Passout year - {{ $people['graduation_year'] }}</p>
                                        <a href="{{ route('friend.request', ['token' => $people['remember_token']]) }}"
                                            class="text-sm px-3 py-2 mt-1 rounded-xl bg-indigo-500 hover:bg-indigo-600 border-[3px] border-indigo-900 mb-3 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5">
                                                <path
                                                    d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                            </svg>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-lg mx-2 text-red-500">No suggested people found!</p>
                        @endif

                </section>
            </div>
        </div>
    </div>
@endsection
