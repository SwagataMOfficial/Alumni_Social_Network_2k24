@extends('layouts.main')
@push('title')
    <title>Settings | Alumni Junction</title>
@endpush
@section('main-section')
    {{-- max-width container with left,right space --}}
    <div class="px-8 mx-auto pt-3 flex justify-center gap-10">

        {{-- left navigation panel --}}
        <div class="w-1/4 rounded-xl h-fit bg-white pb-3">
            <h1 class="text-stone-600 font-bold text-2xl mx-5 my-2">Settings</h1>
            <div class="border-t border-t-black">
                <nav class="flex flex-col items-center justify-center gap-2 mt-2" id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="bg-stone-200 border-l-[3px] border-l-sky-600"
                    data-tabs-inactive-classes="text-stone-600" role="tablist">

                    {{-- tab-2 --}}
                    <button class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 "
                        id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-7 aspect-square text-stone-700">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-lg font-semibold">
                            Account
                        </span>
                    </button>

                    {{-- tab-4 --}}
                    <button class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 "
                        id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
                        aria-controls="contacts" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-7 aspect-square text-stone-700">
                            <path
                                d="M12.232 4.232a2.5 2.5 0 0 1 3.536 3.536l-1.225 1.224a.75.75 0 0 0 1.061 1.06l1.224-1.224a4 4 0 0 0-5.656-5.656l-3 3a4 4 0 0 0 .225 5.865.75.75 0 0 0 .977-1.138 2.5 2.5 0 0 1-.142-3.667l3-3Z" />
                            <path
                                d="M11.603 7.963a.75.75 0 0 0-.977 1.138 2.5 2.5 0 0 1 .142 3.667l-3 3a2.5 2.5 0 0 1-3.536-3.536l1.225-1.224a.75.75 0 0 0-1.061-1.06l-1.224 1.224a4 4 0 1 0 5.656 5.656l3-3a4 4 0 0 0-.225-5.865Z" />
                        </svg>
                        <span class="text-lg font-semibold">
                            Social Links
                        </span>
                    </button>

                    {{-- tab-5 --}}
                    <button class="flex items-center justify-start gap-3 w-full py-2 pl-6 hover:bg-slate-200 "
                        id="new-styled-tab" data-tabs-target="#new-item" type="button" role="tab" aria-controls="new"
                        aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-7 aspect-square text-stone-700">
                            <path fill-rule="evenodd"
                                d="M8 7a5 5 0 1 1 3.61 4.804l-1.903 1.903A1 1 0 0 1 9 14H8v1a1 1 0 0 1-1 1H6v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-2a1 1 0 0 1 .293-.707L8.196 8.39A5.002 5.002 0 0 1 8 7Zm5-3a.75.75 0 0 0 0 1.5A1.5 1.5 0 0 1 14.5 7 .75.75 0 0 0 16 7a3 3 0 0 0-3-3Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-lg font-semibold">
                            Change Password
                        </span>
                    </button>
                </nav>
            </div>
        </div>

        {{-- right main settings option --}}
        <div id="default-styled-tab-content" class="w-3/4 flex flex-col gap-3 mb-3">

            {{-- account settings starts here --}}
            <div class="hidden" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                {{-- settings section here --}}
                <section class="rounded-xl overflow-hidden bg-white px-6 py-2 mb-3">
                    <h3 class="text-stone-600 font-bold text-xl mb-2">Personal Information</h3>
                    <div class="flex flex-col">
                        <a href="{{url('/')}}/profile/edit#name"
                            class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                            <span>Name, About me, Location</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="{{url('/')}}/profile/edit#phone"
                            class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                            <span>Contact details</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="{{url('/')}}/profile/edit#graduation_year"
                            class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                            <span>Education details</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="{{url('/')}}/profile/edit#documents_upload_section"
                            class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                            <span>Account verification</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
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
                <section class="rounded-xl overflow-hidden bg-white px-6 py-2 mb-3">
                    <h3 class="text-stone-600 font-bold text-xl mb-2">Highlights</h3>
                    <div class="flex flex-col">
                        <a href="{{url('/')}}/profile/edit#skills"
                            class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                            <span>Skills and expertise</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="{{url('/')}}/profile/edit#career_history"
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
                        <a href="{{url('/')}}/profile/edit#publications"
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
                        <a href="{{url('/')}}/profile/edit#first_company"
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
                        <form action="{{ route('profile.delete') }}" method="post" class="hidden" id="delete_acc_form">
                            @csrf
                            <input type="password" name="password" id="password_for_delete">
                            <input type="hidden" name="delete_acc_id" value="{{ session()->get('user_id') }}" required>
                        </form>
                        <button type="submit" form="delete_acc_form"
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
                        </button>
                    </div>
                </section>
            </div>
            {{-- account settings ends here --}}

            {{-- social links settings starts here --}}
            <div class="hidden" id="styled-contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <section class="rounded-xl overflow-hidden bg-white px-6 py-2">
                    <h3 class="text-stone-600 font-bold text-xl mb-2">Social links</h3>
                    <div class="flex flex-col">
                        <a href="{{url('/')}}/profile/edit#facebook_link"
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
                        <a href="{{url('/')}}/profile/edit#instagram_link"
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
                        <a href="{{url('/')}}/profile/edit#github_link"
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
                        <a href="{{url('/')}}/profile/edit#twitter_link"
                            class="w-full px-4 flex justify-between items-center py-2 hover:bg-slate-200 rounded-lg">
                            <span>Twitter</span>
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
                        <a href="{{url('/')}}/profile/edit#linkedin_link"
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
                    </div>
                </section>
            </div>
            {{-- social links settings ends here --}}

            {{-- change password settings starts here --}}
            <div class="hidden" id="new-item" role="tabpanel" aria-labelledby="new-tab">
                <section class="rounded-xl overflow-hidden bg-white px-6 py-3">
                    <h3 class="text-stone-600 font-bold text-xl mb-4">Change Your Password</h3>
                    <form id="changePasswordForm" class="w-full px-4 flex flex-col justify-between items-center py-2">
                        @csrf
                        <div class="mb-4 w-3/4">
                            <input type="password" name="c_old_password" id="c_old_password"
                                class="p-2 border-2 border-stone-500 rounded-xl w-full pl-4"
                                placeholder="Enter Your Old Password" required>
                        </div>
                        <div class="mb-4 w-3/4">
                            <input type="password" name="c_new_password" id="c_c_new_password"
                                class="p-2 border-2 border-stone-500 rounded-xl w-full pl-4"
                                placeholder="Enter Your New Password" required>
                        </div>
                        <div class="mb-5 w-3/4">
                            <input type="password" name="c_new_cpassword_again" id="c_c_new_cpassword_again"
                                class="p-2 border-2 border-stone-500 rounded-xl w-full pl-4"
                                placeholder="Confirm Your Password" required>
                        </div>
                        <button type="submit"
                            class="rounded-3xl px-6 py-2 font-semibold tracking-wide bg-blue-600 text-white hover:bg-blue-700 flex items-center gap-2 focus:ring-2 focus:outline-none focus:ring-blue-800">
                            <span>Change Password</span>
                        </button>
                    </form>
                </section>
            </div>
            {{-- change password settings ends here --}}
        </div>
    </div>
@endsection
@push('script')
    <script>
        //ajax request for change password
        $(document).ready(function() {

            // HANDLING CHANGE PASSWORD
            $('#changePasswordForm').submit(function(e) {
                e.preventDefault();

                // Display confirmation alert
                Swal.fire({
                    title: 'Change Password',
                    text: 'Are you sure you want to change your password?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Change',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, proceed with AJAX request to change password
                        $.ajax({
                            url: "{{ route('profile.changePassword') }}",
                            type: "POST",
                            data: $(this).serialize(),
                            success: function(response) {
                                swal("Success", response.message, "success");
                                $('#changePasswordForm')[0].reset();
                            },
                            error: function(xhr) {
                                swal("Error", xhr.responseJSON.message, "error");
                            }
                        });
                    }
                });
            });

            // HANDLING ACCOUNT DELETE
            $("#delete_acc_form").submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Do you really want to delete your account?',
                    text: 'This action is irreversible! Press confirm to continue, cancel to exit..',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then(async (result) => {
                    if (result.isConfirmed) {

                        // asking for password before submitting the form
                        const password = await Swal.fire({
                            title: "Enter the password to continue",
                            input: "password",
                            inputLabel: "Password",
                            inputPlaceholder: "Enter your password",
                            inputAttributes: {
                                minlength: "6",
                                autocapitalize: "off",
                                autocorrect: "off"
                            },
                            inputValidator: (password) => {
                                if (!password) {
                                    return "Please enter your password!";
                                }
                                if (password && password.length < 6) {
                                    return "Password must be at least 6 characters long!";
                                }
                            }
                        }).then((result) => {

                            if (result.isConfirmed) {
                                // submitting the form

                                // adding the password field
                                $("#password_for_delete").val(result.value);

                                let formData = new FormData(this);

                                $.ajax({
                                    url: "{{ route('profile.delete') }}",
                                    method: 'POST',
                                    data: formData,
                                    contentType: false, // Prevent jQuery from automatically setting the Content-Type header
                                    processData: false,
                                    success: function(response) {

                                        // Handle the AJAX response here
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Account Successfully deleted!',
                                            showConfirmButton: false,
                                            timer: 1500
                                        }).then(function() {
                                            location.href = "{{ route('auth.logout') }}";
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
                                            timer: 2500
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
