@extends('layouts.main')
@push('title')
    <title>Message | Alumni Junction</title>
@endpush
@section('main-section')
    {{-- <h1 class="text-3xl font-bold text-blue-700">
        Messages Page!
    </h1> --}}
    <div class="container">
        <div class="px-8 mx-auto pt-3 flex justify-center gap-10">
            {{-- left navigation panel --}}
            <div class="w-1/4 rounded-xl h-fit bg-white pt-3">
                <h1 class="text-stone-700 font-semibold text-xl pb-2 px-5">Your Chats</h1>
                <form class="max-w-md mx-auto border-b border-b-gray-300 px-5 pb-3 mb-3">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search your chats" required />
                    </div>
                </form>

                {{-- listing all the chats here --}}
                <ul class="overflow-y-auto max-h-[30rem] pb-3">
                    {{-- active one --}}
                    <li
                        class="px-4 flex items-center justify-between py-2 hover:bg-gray-300 cursor-pointer border-l-[3px] border-l-blue-500 bg-gray-200">
                        <div class="flex items-center">
                            <img class="w-12 aspect-square object-cover" src="/storage/default/avatar.jpg"
                                alt="profile image">
                            <div class="ml-3">
                                <p class="font-semibold text-lg">Swagata Mukherjee</p>
                                {{-- TODO: slice first 20 characters and then add '....' --}}
                                <p class="text-sm">You: 1234567890abcdefghij....</p>
                            </div>
                        </div>
                        <p class="self-start">05:30 PM</p>
                    </li>
                    @for ($i = 1; $i <= 1; $i++)
                        <li class="px-4 flex items-center justify-between py-2 hover:bg-gray-300 cursor-pointer">
                            <div class="flex items-center">
                                <img class="w-12 aspect-square object-cover" src="/storage/default/avatar.jpg"
                                    alt="profile image">
                                <div class="ml-3">
                                    <p class="font-semibold text-lg">Swagata Mukherjee</p>
                                    <p class="text-sm">You: Hello</p>
                                </div>
                            </div>
                            <p class="self-start">05:30 PM</p>
                        </li>
                    @endfor
                </ul>
            </div>
            {{-- right main settings option --}}
            <div class="w-3/4">
                <section class="rounded-xl overflow-hidden bg-gray-100 pt-4">
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="/profile/usertoken"
                                    class="block px-4 py-2 hover:bg-gray-100">View Profile</a>
                            </li>
                        </ul>
                    </div>
                    {{-- header --}}
                    <div class="flex justify-between items-center border-b border-b-gray-300 px-8 pb-3">
                        <div class="flex items-center gap-5">
                            <img class="w-12 aspect-square object-cover rounded-[50%]" src="/storage/default/avatar.jpg"
                                alt="profile image">
                            <p class="text-2xl font-semibold">Swagata Mukherjee</p>
                        </div>

                        {{-- options icon --}}
                        <button type="button" class="w-8 aspect-square cursor-pointer hover:text-blue-600"
                            id="dropdownDefaultButton" data-dropdown-toggle="dropdown" data-dropdown-delay="1500" data-dropdown-placement="bottom" data-dropdown-offset-skidding="-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-full h-full">
                                <path fill-rule="evenodd"
                                    d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="bg-white min-h-[63.2vh] max-h-[63.2vh] overflow-y-auto flex flex-col gap-3 p-4">
                        <!-- Recipient's messages -->
                        <div class="flex items-start relative ml-2">
                            <div class="relative flex items-center justify-center">
                                <div class="bg-gray-500 text-white rounded-lg px-3 py-2 flex flex-col max-w-[30rem]">
                                    <p class="text-lg pr-10 text-wrap">Recipient Message</p>
                                    <p class="text-lg self-end">11:45 AM</p>
                                </div>
                                <span class="absolute -left-5 top-5 rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-8 h-8 text-gray-500">
                                        <path fill-rule="evenodd"
                                            d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <!-- Your messages -->
                        <div class="flex items-end justify-end relative">
                            <div class="relative mr-2">
                                <div class="bg-blue-500 text-white rounded-lg px-3 py-2 flex flex-col max-w-[30rem]">
                                    <p class="text-lg pr-10 text-wrap">My message</p>
                                    <p class="text-lg self-end">11:45 AM</p>
                                </div>
                                <span class="absolute -right-5 top-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-8 h-8 text-blue-500">
                                        <path fill-rule="evenodd"
                                            d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <form method="POST" action="#">
                            <label for="chat" class="sr-only">Your message</label>
                            <div class="flex items-center px-3 py-4 bg-gray-50">
                                <textarea id="chat" rows="1"
                                    class="block mx-2 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                    placeholder="Type Your message..."></textarea>
                                <button type="submit"
                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 focus:ring-2 focus:outline-none focus:ring-blue-700">
                                    <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                    </svg>
                                    <span class="sr-only">Send message</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
