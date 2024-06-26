<div class="relative bg-white rounded-lg overflow-hidden md:mx-8 shadow mb-2">

    <!-- Three-dot button -->
    <button id="btn_{{ $key }}" data-dropdown-toggle="dropdown_job_{{ $key }}"
        data-dropdown-placement="right"
        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 focus:outline-none" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
    </button>

    <div id="dropdown_job_{{ $key }}"
        class="z-10 shadow-lg hidden bg-white divide-y divide-gray-100 rounded-lg w-40">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="btn_{{ $key }}">
            <li>
                <a href="/profile/{{ $details['remember_token'] }}" class="block px-4 py-2 hover:bg-gray-100">View
                    Profile</a>
            </li>
            @if (session()->get('user_id') == $details['student_id'])
                <li>
                    <a href="javascript:void(0);" data-delete-post="{{route('post.delete', ['id' => $posts['post_id']])}}" class="block px-4 py-2 hover:bg-gray-100">Delete</a>
                </li>
            @endif
        </ul>
    </div>

    <!-- Header -->
    <div class="flex items-center space-x-4 pr-4 pl-2 max-[425px]:pt-2 pt-4">
        <a href="/profile/{{ $details['remember_token'] }}">
            <img src="{{ asset('/storage/' . $details['profile_picture']) }}" alt="Profile Picture"
                class="max-[425px]:h-12 h-16 aspect-square rounded-full object-cover object-center">
        </a>

        @php
            // generating date
            use Carbon\Carbon;
            $givenDate = Carbon::createFromDate($posts['created_at']);

            // Current date
            $currentDate = Carbon::now();

            // Get the time difference in a human-readable format
            $timeAgo = $givenDate->diffForHumans($currentDate);
            $timeAgo = str_replace('before', 'ago', $timeAgo);
        @endphp

        <div class="px-2">
            <h3 class="font-semibold text-gray-700 max-[425px]:text-xl text-2xl sm:text-3xl">{{ $details['name'] }}</h3>
            <p class="text-gray-500 text-base sm:text-lg">Posted {{ $timeAgo }}</p>
        </div>
    </div>

    <!-- Content -->
    <div class="p-2">
        <p class="text-gray-800 text-xl">{{ $posts['post_description'] }}. <a href="{{ $posts['registration_link'] }}"
                target="_blank" class="text-lg text-blue-600 underline">Click here to register</a></p>
    </div>

    {{-- checking if the user has liked the post or not --}}
    @php
        $liked = false;
    @endphp
    @foreach ($likeduser as $item)
        @isset($item['liked_by'])
            @if ($item['liked_by'] == session()->get('user_id'))
                @php
                    $liked = true;
                    $like_id = $item['like_id'];
                @endphp
            @endif
        @endisset
    @endforeach

    <!-- Options -->
    <div class="flex justify-between items-center px-4">
        <p class="text-blue-700 font-bold px-2">{{ $posts['likes'] }} {{ $posts['likes'] <= 1 ? 'Like' : 'Likes' }}
        </p>
        <p class="text-blue-700 font-bold px-2">{{ $posts['comment_count'] }}
            {{ $posts['comment_count'] <= 1 ? 'Comment' : 'Comments' }}</p>
    </div>
    <div class="p-4 flex justify-between items-center">
        <form action="{{ route('post.like') }}" method="post" class="hidden" id="like_form_{{ $key }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $posts['post_id'] }}">

            @if (isset($like_id) && $liked)
                <input type="hidden" name="like_id" value="{{ $like_id }}">
            @endif
        </form>
        {{-- like button --}}
        @if ($liked == true)
            <button type="submit" form="like_form_{{ $key }}"
                class="like_btns text-blue-500 hover:text-blue-700 focus:outline-none flex items-center font-bold"
                id="{{ $posts['post_id'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                </svg>

                <span class="ml-1">Liked</span>
            </button>
        @else
            <button type="submit" form="like_form_{{ $key }}"
                class="like_btns text-gray-500 hover:text-blue-500 focus:outline-none flex items-center"
                id="{{ $posts['post_id'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                </svg>

                <span class="ml-1">Like</span>
            </button>
        @endif

        {{-- comment button with comment section toggling --}}
        <button class="text-gray-500 hover:text-blue-500 focus:outline-none flex items-center" type="button"
            data-target-comment-section-toggle="comments_jobs_{{ $key }}"
            data-focus-comment-input="chat_{{ $key }}" data-role="comment">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
            <span class="ml-1">Comment</span>
        </button>

        {{-- report button --}}
        <a href="javascript:void(0);" data-report-link="{{ route('post.report', ['id' => $posts['post_id']]) }}"
            class="text-gray-500 hover:text-blue-500 focus:outline-none flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
            <span class="ml-1">Report</span>
        </a>
    </div>

    {{-- comment section starts here --}}
    <div class="hidden" id="comments_jobs_{{ $key }}">
        <form class="border-t border-t-gray-300" action="{{ route('comments.add') }}" method="POST">
            @csrf
            <div class="flex items-center px-3 py-2 bg-gray-50">
                <img src="{{ asset('/storage/' . session()->get('user_profile_img')) }}" alt="profile"
                    class="w-8 h-8 object-cover object-center rounded-[50%]">
                <label for="chat_{{ $key }}" class="sr-only">Your comment</label>
                <input type="hidden" name="post_id" value="{{ $posts['post_id'] }}">
                <textarea id="chat_{{ $key }}" rows="1"
                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    name="comment" placeholder="Your comment...." required></textarea>
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

        {{-- displaying comments here --}}
        <div class="">
            <div class="bg-gray-50 px-4 py-3 border-y border-t-gray-300">
                <h2 class="text-lg font-semibold text-gray-800">Comments</h2>
            </div>
            <section class="px-4 py-3 max-h-36 overflow-y-auto">
                @if (count($comments) != 0)
                    @foreach ($comments as $index => $comment)
                        <x-comments :comments="$comment" :userdetails="$comment['get_user']" :key="$key" :index="$index" />
                    @endforeach
                @else
                    <h3 class="text-center text-red-500">No comments yet</h3>
                @endif
            </section>
        </div>
    </div>
</div>
