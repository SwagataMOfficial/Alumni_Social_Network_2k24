<div class="relative bg-white rounded-lg overflow-hidden mx-8 shadow mb-2">

    <!-- Three-dot button -->
    <button id="btn_{{ $key }}" data-dropdown-toggle="dropdown_{{ $key }}"
        data-dropdown-placement="right"
        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
    </button>

    <div id="dropdown_{{ $key }}" class="z-10 shadow-lg hidden bg-white divide-y divide-gray-100 rounded-lg w-40">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="btn_{{ $key }}">
            <li>
                <a href="/profile/home/{{ $details['remember_token'] }}" class="block px-4 py-2 hover:bg-gray-100">View
                    Profile</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Report</a>
            </li>
            @if (session()->get('user_id') == $details['student_id'])
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Delete</a>
                </li>
            @endif
        </ul>
    </div>

    <!-- Header -->
    <div class="flex items-center space-x-4 pr-4 pl-2">
        <a href="/profile/home/{{ $details['remember_token'] }}">
            <img src="{{ asset('/storage/' . $details['profile_picture']) }}" alt="Profile Picture"
                class="h-16 aspect-square rounded-full object-cover">
        </a>

        @php
            // generating date
            use Carbon\Carbon;
            $givenDate = Carbon::createFromDate($posts['created_at']);

            // Current date
            $currentDate = Carbon::now();

            // Get the time difference in a human-readable format
            $timeAgo = $givenDate->diffForHumans($currentDate);
        @endphp

        <div class="px-2">
            <h3 class="font-semibold text-gray-700 text-3xl">{{ $details['name'] }}</h3>
            <p class="text-gray-500 text-lg">Posted {{ $timeAgo }}</p>
        </div>
    </div>

    <!-- Content -->
    <div class="p-2">
        <p class="text-gray-800 text-xl">{{ $posts['post_description'] }}</p>

        {{-- checking if the post contains any image or not --}}
        @if ($posts['attachment'] != null)

            {{-- checking for carousel post and normal post  --}}
            @if (stripos($posts['attachment'], '||') != false)

                @php
                    $imgArr = explode('||', $posts['attachment']);
                @endphp

                {{-- carousel --}}
                <div id="indicators-carousel" class="relative w-full mt-4" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-[36rem]">
                        <!-- Item 1 -->
                        @foreach ($imgArr as $index => $img)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                <img src="{{ asset('/storage/' . $img) }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                            <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            @else
                {{-- not carousel --}}
                <img src="{{ asset('/storage/' . $posts['attachment']) }}" alt="Posted Picture"
                    class="mt-4 rounded-lg h-[36rem] w-full">
            @endif
        @endif
    </div>

    <!-- Options -->
    <p class="text-blue-700 font-bold px-2">{{ $posts['likes'] }} {{ $posts['likes'] <= 1 ? 'Like' : 'Likes' }}</p>
    <div class="p-4 flex justify-between items-center">
        <form action="{{ route('post.like') }}" method="post" class="hidden" id="{{ $key }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $posts['post_id'] }}">
        </form>
        <button type="submit" form="{{ $key }}" {{-- @isset($likeduser['liked_by'])
                @if ($likeduser['liked_by'] == session()->get('user_id'))
                    {{ 'disabled' }}
                @endif
            @endisset --}}
            class="like_btns text-gray-500 hover:text-blue-500 focus:outline-none flex items-center"
            id="{{ $posts['post_id'] }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
            </svg>
            {{-- <span class="ml-1">Like</span> --}}
            <span class="ml-1">
                @isset($likeduser['liked_by'])
                    @if ($likeduser['liked_by'] == session()->get('user_id'))
                        {{ 'Liked' }}
                    @endif
                @else
                    {{ 'Like' }}
                @endisset
            </span>
        </button>

        <button class="text-gray-500 hover:text-blue-500 focus:outline-none flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <span class="ml-1">Comment</span>
        </button>

        <button class="text-gray-500 hover:text-blue-500 focus:outline-none flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
            <span class="ml-1">Share</span>
        </button>
    </div>
</div>
