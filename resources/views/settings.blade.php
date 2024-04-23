@extends('layouts.main')
@push('title')
    <title>Settings | Alumni Junction</title>
@endpush
@section('main-section')
    {{-- background gray container --}}
    {{-- <div class="container bg-gray-200 min-h-[calc(100vh-67px)]"> --}}
    <div class="container">
        {{-- max-width container with left,right space --}}
        <div class="px-8 mx-auto pt-3 flex justify-center gap-10">

            {{-- left navigation panel --}}
            <div class="w-1/4 rounded-xl h-fit bg-white pb-3">
                <h1 class="text-stone-600 font-bold text-2xl mx-5 my-2">Settings</h1>
                <div class="border-t border-t-black">
                    <div class="flex flex-col items-center justify-center gap-2 mt-2">

                        {{-- tab-1 --}}
                        <a href="/settings/general/{{ Session::get('token') }}"
                            class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 {{ Request::is('settings/general/*') ? 'bg-stone-200 border-l-[3px] border-l-sky-600' : '' }} ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-7 aspect-square text-stone-700">
                                <path
                                    d="M13.024 9.25c.47 0 .827-.433.637-.863a4 4 0 0 0-4.094-2.364c-.468.05-.665.576-.43.984l1.08 1.868a.75.75 0 0 0 .649.375h2.158ZM7.84 7.758c-.236-.408-.79-.5-1.068-.12A3.982 3.982 0 0 0 6 10c0 .884.287 1.7.772 2.363.278.38.832.287 1.068-.12l1.078-1.868a.75.75 0 0 0 0-.75L7.839 7.758ZM9.138 12.993c-.235.408-.039.934.43.984a4 4 0 0 0 4.094-2.364c.19-.43-.168-.863-.638-.863h-2.158a.75.75 0 0 0-.65.375l-1.078 1.868Z" />
                                <path fill-rule="evenodd"
                                    d="m14.13 4.347.644-1.117a.75.75 0 0 0-1.299-.75l-.644 1.116a6.954 6.954 0 0 0-2.081-.556V1.75a.75.75 0 0 0-1.5 0v1.29a6.954 6.954 0 0 0-2.081.556L6.525 2.48a.75.75 0 1 0-1.3.75l.645 1.117A7.04 7.04 0 0 0 4.347 5.87L3.23 5.225a.75.75 0 1 0-.75 1.3l1.116.644A6.954 6.954 0 0 0 3.04 9.25H1.75a.75.75 0 0 0 0 1.5h1.29c.078.733.27 1.433.556 2.081l-1.116.645a.75.75 0 1 0 .75 1.298l1.117-.644a7.04 7.04 0 0 0 1.523 1.523l-.645 1.117a.75.75 0 1 0 1.3.75l.644-1.116a6.954 6.954 0 0 0 2.081.556v1.29a.75.75 0 0 0 1.5 0v-1.29a6.954 6.954 0 0 0 2.081-.556l.645 1.116a.75.75 0 0 0 1.299-.75l-.645-1.117a7.042 7.042 0 0 0 1.523-1.523l1.117.644a.75.75 0 0 0 .75-1.298l-1.116-.645a6.954 6.954 0 0 0 .556-2.081h1.29a.75.75 0 0 0 0-1.5h-1.29a6.954 6.954 0 0 0-.556-2.081l1.116-.644a.75.75 0 0 0-.75-1.3l-1.117.645a7.04 7.04 0 0 0-1.524-1.523ZM10 4.5a5.475 5.475 0 0 0-2.781.754A5.527 5.527 0 0 0 5.22 7.277 5.475 5.475 0 0 0 4.5 10a5.475 5.475 0 0 0 .752 2.777 5.527 5.527 0 0 0 2.028 2.004c.802.458 1.73.719 2.72.719a5.474 5.474 0 0 0 2.78-.753 5.527 5.527 0 0 0 2.001-2.027c.458-.802.719-1.73.719-2.72a5.475 5.475 0 0 0-.753-2.78 5.528 5.528 0 0 0-2.028-2.002A5.475 5.475 0 0 0 10 4.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="text-lg font-semibold {{ Request::is('settings/general/*') ? '' : 'text-stone-700' }} ">
                                General
                            </span>
                        </a>

                        {{-- tab-2 --}}
                        <a href="/settings/account/{{ Session::get('token') }}"
                            class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 {{ Request::is('settings/account/*') ? 'bg-stone-200 border-l-[3px] border-l-sky-600' : '' }} ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-7 aspect-square text-stone-700">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="text-lg font-semibold {{ Request::is('settings/account/*') ? '' : 'text-stone-700' }} ">
                                Account
                            </span>
                        </a>

                        {{-- tab-3 --}}
                        <a href="/settings/security-and-privacy/{{ Session::get('token') }}"
                            class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 {{ Request::is('settings/security-and-privacy/*') ? 'bg-stone-200 border-l-[3px] border-l-sky-600' : '' }} ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-7 aspect-square text-stone-700">
                                <path fill-rule="evenodd"
                                    d="M9.661 2.237a.531.531 0 0 1 .678 0 11.947 11.947 0 0 0 7.078 2.749.5.5 0 0 1 .479.425c.069.52.104 1.05.104 1.59 0 5.162-3.26 9.563-7.834 11.256a.48.48 0 0 1-.332 0C5.26 16.564 2 12.163 2 7c0-.538.035-1.069.104-1.589a.5.5 0 0 1 .48-.425 11.947 11.947 0 0 0 7.077-2.75Zm4.196 5.954a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="text-lg font-semibold {{ Request::is('settings/security-and-privacy/*') ? '' : 'text-stone-700' }} ">
                                Security & Privacy
                            </span>
                        </a>

                        {{-- tab-4 --}}
                        <a href="/settings/social-links/{{ Session::get('token') }}"
                            class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 {{ Request::is('settings/social-links/*') ? 'bg-stone-200 border-l-[3px] border-l-sky-600' : '' }} ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-7 aspect-square text-stone-700">
                                <path
                                    d="M12.232 4.232a2.5 2.5 0 0 1 3.536 3.536l-1.225 1.224a.75.75 0 0 0 1.061 1.06l1.224-1.224a4 4 0 0 0-5.656-5.656l-3 3a4 4 0 0 0 .225 5.865.75.75 0 0 0 .977-1.138 2.5 2.5 0 0 1-.142-3.667l3-3Z" />
                                <path
                                    d="M11.603 7.963a.75.75 0 0 0-.977 1.138 2.5 2.5 0 0 1 .142 3.667l-3 3a2.5 2.5 0 0 1-3.536-3.536l1.225-1.224a.75.75 0 0 0-1.061-1.06l-1.224 1.224a4 4 0 1 0 5.656 5.656l3-3a4 4 0 0 0-.225-5.865Z" />
                            </svg>
                            <span
                                class="text-lg font-semibold {{ Request::is('settings/social-links/*') ? '' : 'text-stone-700' }} ">
                                Social Links
                            </span>
                        </a>

                        {{-- tab-5 --}}
                        <a href="/settings/change-password/{{ Session::get('token') }}"
                            class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 {{ Request::is('settings/change-password/*') ? 'bg-stone-200 border-l-[3px] border-l-sky-600' : '' }} ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-7 aspect-square text-stone-700">
                                <path fill-rule="evenodd"
                                    d="M8 7a5 5 0 1 1 3.61 4.804l-1.903 1.903A1 1 0 0 1 9 14H8v1a1 1 0 0 1-1 1H6v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-2a1 1 0 0 1 .293-.707L8.196 8.39A5.002 5.002 0 0 1 8 7Zm5-3a.75.75 0 0 0 0 1.5A1.5 1.5 0 0 1 14.5 7 .75.75 0 0 0 16 7a3 3 0 0 0-3-3Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="text-lg font-semibold {{ Request::is('settings/change-password/*') ? '' : 'text-stone-700' }} ">
                                Change Password
                            </span>
                        </a>

                        {{-- tab-6 --}}
                        <a href="/settings/notifications/{{ Session::get('token') }}"
                            class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 {{ Request::is('settings/notifications/*') ? 'bg-stone-200 border-l-[3px] border-l-sky-600' : '' }} ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-7 aspect-square text-stone-700">
                                <path
                                    d="M4.214 3.227a.75.75 0 0 0-1.156-.955 8.97 8.97 0 0 0-1.856 3.825.75.75 0 0 0 1.466.316 7.47 7.47 0 0 1 1.546-3.186ZM16.942 2.272a.75.75 0 0 0-1.157.955 7.47 7.47 0 0 1 1.547 3.186.75.75 0 0 0 1.466-.316 8.971 8.971 0 0 0-1.856-3.825Z" />
                                <path fill-rule="evenodd"
                                    d="M10 2a6 6 0 0 0-6 6c0 1.887-.454 3.665-1.257 5.234a.75.75 0 0 0 .515 1.076 32.91 32.91 0 0 0 3.256.508 3.5 3.5 0 0 0 6.972 0 32.903 32.903 0 0 0 3.256-.508.75.75 0 0 0 .515-1.076A11.448 11.448 0 0 1 16 8a6 6 0 0 0-6-6Zm0 14.5a2 2 0 0 1-1.95-1.557 33.54 33.54 0 0 0 3.9 0A2 2 0 0 1 10 16.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span
                                class="text-lg font-semibold {{ Request::is('settings/notifications/*') ? '' : 'text-stone-700' }} ">
                                Notifications
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- right main settings option --}}
            <div class="w-3/4 flex flex-col gap-3 mb-3">
                {{-- general settings starts here --}}
                @if (Request::is('settings/general/*'))
                    {{-- settings section here --}}
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Preferences</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Language</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Theme color</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>
                    {{-- settings section here --}}
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">User Choice</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Data Usage and media quality</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Accessability</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>
                @endif
                {{-- general settings ends here --}}

                {{-- account settings starts here --}}
                @if (Request::is('settings/account/*'))
                    {{-- settings section here --}}
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Personal Information</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Name, About me, Location</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>More personal Information</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Account verification</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>

                    {{-- settings section here --}}
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Highlights</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Skills and expertise</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Education and career history</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Projects and publications</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Work experience</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>

                    {{-- settings section here --}}
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Account Actions</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-red-100 rounded-lg">
                                <span class="text-red-500 font-semibold">Deactivate account</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-red-100 rounded-lg">
                                <span class="text-red-500 font-bold">Delete account</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>
                @endif
                {{-- account settings ends here --}}

                {{-- security and privacy settings starts here --}}
                @if (Request::is('settings/security-and-privacy/*'))
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Account Security</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Two-step verification</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Remember this device</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>

                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Credential manager</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Change login email</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Get 2FA tokens</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>

                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">User Privacy</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Profile visibility</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Who can see my profile picture</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Who can see my cover picture</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Who can send me messages</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>
                @endif
                {{-- security and privacy settings ends here --}}

                {{-- social links settings starts here --}}
                @if (Request::is('settings/social-links/*'))
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Social links</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Facebook</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Instagram</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Linkedin</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Github</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>
                @endif
                {{-- security and privacy settings ends here --}}

                {{-- change password settings starts here --}}
                @if (Request::is('settings/change-password/*'))
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-3">
                        <h3 class="text-stone-600 font-bold text-xl mb-4">Change Your Password</h3>
                        <form action="" method="post"
                            class="w-full px-4 flex flex-col justify-between items-center py-2">
                            @csrf
                            <div class="mb-4 w-3/4">
                                <label for="" class=""></label>
                                <input type="password" name="" id=""
                                    class="p-2 border-2 border-stone-500 rounded-xl w-full"
                                    placeholder="Enter Your Old Password">
                            </div>
                            <div class="mb-4 w-3/4">
                                <label for="" class=""></label>
                                <input type="password" name="" id=""
                                    class="p-2 border-2 border-stone-500 rounded-xl w-full"
                                    placeholder="Enter Your New Password">
                            </div>
                            <div class="mb-5 w-3/4">
                                <label for="" class=""></label>
                                <input type="password" name="" id=""
                                    class="p-2 border-2 border-stone-500 rounded-xl w-full"
                                    placeholder="Confirm Your Password">
                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-green-300 rounded-xl border-[3px] border-green-700 hover:bg-green-500 hover:text-white font-medium">Change
                                Password</button>
                        </form>
                    </section>
                @endif
                {{-- security and privacy settings ends here --}}

                {{-- notification settings starts here --}}
                @if (Request::is('settings/notifications/*'))
                    <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                        <h3 class="text-stone-600 font-bold text-xl mb-2">Notifications</h3>
                        <div class="flex flex-col">
                            <a href="#"
                                class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                                <span>Set which notifications you want to receive</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </section>
                @endif
                {{-- security and privacy settings ends here --}}
            </div>
        </div>
    </div>
@endsection
