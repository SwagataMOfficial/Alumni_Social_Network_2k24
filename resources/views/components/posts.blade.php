<div class="container mx-auto mt-4 lg:w-full">

    {{-- only show the post modal if the profile is my and all checks are met --}}
    @if ($details['verified_at'] != null && $details['deleted_acc'] == 0 && $details['ban_acc'] == 0)
        @if ($details['student_id'] == session()->get('user_id'))
            <div class="flex items-center justify-center">
                <div
                    class="inline-flex items-center justify-center p-4 bg-white rounded-full drop-shadow-xl border border-gray-300 mb-5">
                    <!-- Profile picture -->
                    <a href="/profile/{{ $details['remember_token'] }}"
                        class="rounded-full bg-gray-300 h-12 w-12 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('/storage/' . $details['profile_picture']) }}" alt="image"
                            class="w-full h-full object-cover">
                    </a>

                    <!-- Input box -->
                    <input type="text" name="post_description"
                        class="rounded-full border-gray-500 border h-12 pl-6 pr-14 ml-4 mr-10 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Add a post" id="post_modal_opener_profile_page">

                    <!-- Icons -->
                    <div class="ml-4 flex items-center space-x-14 mr-4">

                        <!-- three icons -->

                        <!-- text_job_modal toggle -->
                        <button data-modal-target="text_job_modal_profile_page"
                            data-modal-toggle="text_job_modal_profile_page" type="button"
                            id="text_or_job_post_btn_profile_page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 cursor-pointer hover:text-stone-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>

                        <!-- camera button -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 cursor-not-allowed text-stone-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                        </svg>

                        <!-- Modal toggle -->
                        <button data-modal-target="post_modal_profile_page" data-modal-toggle="post_modal_profile_page"
                            type="button">
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
        @endif
    @endif

    @if (count($posts) != 0)
        @foreach ($posts as $index => $post)
            <x-profilepostview :details="$post['get_user']" :likeduser="$post['get_liked_user']" :posts="$post" :comments="$post['get_comments']"
                :key="$index" />
        @endforeach
    @else
        <div class="rounded-lg overflow-hidden mx-auto mb-4">
            <h1 class="text-center text-red-500 font-semibold text-3xl mt-6 mb-2">No Posts Are Available</h1>
        </div>
    @endif
</div>
