@extends('layouts.main')
@push('title')
    <title>Find | Alumni Junction</title>
@endpush

@section('main-section')

    <div class="max-[426px]:px-2 px-4 xl:px-8 mx-auto pt-3 flex justify-center lg:gap-6 xl:gap-10">
        <div class="w-full lg:w-3/4 bg-white rounded-xl px-4 pt-3 pb-6 h-max">

            @if ($user['verified_at'] != null && $user['deleted_acc'] == 0 && $user['ban_acc'] == 0)
                <h3 class="text-2xl font-bold text-stone-700 mb-3">Results</h3>
                {{-- searched account cards will appear here --}}
                @if (count($searchedData) > 0)
                    <div class="grid grid-cols-1 gap-3 min-[425px]:grid-cols-2 md:grid-cols-3 xl:grid-cols-5">
                        {{-- cards --}}
                        @foreach ($searchedData as $data)
                            <div
                                class="rounded-xl bg-slate-200 overflow-hidden relative flex flex-col justify-start items-center">
                                <img src="{{ asset('/storage/' . $data['cover_picture']) }}" alt="cover photo"
                                    class="object-cover max-h-16 w-full">
                                <a href="/profile/{{ $data['remember_token'] }}"
                                    class="absolute top-7 w-20 aspect-square object-cover rounded-[50%] border-2 border-slate-600 overflow-hidden">
                                    <img src="{{ asset('/storage/' . $data['profile_picture']) }}" alt="profile photo"
                                        class="w-full h-full">
                                </a>
                                <p class="mt-14 font-semibold text-xl text-center">{{ $data['name'] }}</p>
                                <p class="text-md py-1">Passout year - {{ $data['graduation_year'] }}</p>

                                {{-- checking if the user is my friend or not [if friend then the message button will appear] --}}
                                @php
                                    $am_i_friend = false;
                                    $is_user_my_friend = false;
                                    $i_requested_and_is_pending = false;
                                    $is_user_requested_and_pending = false;
                                @endphp

                                {{-- here the student_id is my id and friend_id is my friend's id --}}
                                @foreach ($data['get_friends'] as $friend)
                                    @if ($friend['friend_id'] == session()->get('user_id'))
                                        @if ($friend['is_pending'] == 1)
                                            @php
                                                $i_requested_and_is_pending = true;
                                            @endphp
                                        @else
                                            @php
                                                $am_i_friend = true;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach

                                {{-- here student_id is my friend's id and friend_id is my id --}}
                                @foreach ($data['get_alter_friends'] as $friend)
                                    @if ($friend['student_id'] == session()->get('user_id'))
                                        @if ($friend['is_pending'] == 1)
                                            @php
                                                $is_user_requested_and_pending = true;
                                            @endphp
                                        @else
                                            @php
                                                $is_user_my_friend = true;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach

                                @if ($am_i_friend && $is_user_my_friend)
                                    <a href="{{ route('messages', ['token' => $data['remember_token']]) }}"
                                        class="text-sm px-3 py-2 mt-1 rounded-xl bg-green-500 hover:bg-green-600 border-[3px] border-green-800 mb-3 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                d="M10 3c-4.31 0-8 3.033-8 7 0 2.024.978 3.825 2.499 5.085a3.478 3.478 0 0 1-.522 1.756.75.75 0 0 0 .584 1.143 5.976 5.976 0 0 0 3.936-1.108c.487.082.99.124 1.503.124 4.31 0 8-3.033 8-7s-3.69-7-8-7Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-2-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @elseif($i_requested_and_is_pending || $is_user_requested_and_pending)
                                    <div
                                        class="text-sm px-3 py-2 mt-1 rounded-xl bg-gray-500 border-[3px] border-gray-800 mb-3 text-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm.75-13a.75.75 0 0 0-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 0 0 0-1.5h-3.25V5Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @else
                                    <a href="javascript:void(0);"
                                        data-send-link="{{ route('friend.request', ['token' => $data['remember_token']]) }}"
                                        class="text-sm px-3 py-2 mt-1 rounded-xl bg-indigo-500 hover:bg-indigo-600 border-[3px] border-indigo-900 mb-3 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-xl mx-2 text-red-500">No user found!</p>
                @endif
            @else
                <p class="text-2xl mx-2 text-red-500 font-semibold ml-4 mt-3">Action not allowed!</p>

            @endif

        </div>
        {{-- more peoples to follow section --}}
        <div class="w-1/4 rounded-xl h-fit bg-white px-4 py-3 hidden lg:block">

            {{-- adding common validation before showing the actual content --}}
            @if ($user['verified_at'] == null)
                <p class="text-red-600 text-center font-semibold my-2">Account is not verified yet</p>
            @elseif ($user['ban_acc'] != 0)
                <p class="text-red-600 text-center font-semibold my-2">Account has been banned by admin!</p>
            @elseif ($user['deleted_acc'] != 0)
                <p class="text-red-600 text-center font-semibold my-2">Account has been deleted by admin!</p>
            @else
                <h3 class="font-bold text-stone-700">More Peoples for You</h3>
                <div class="flex flex-col gap-3 items-center justify-center mt-2">

                    {{-- getting all the suggested people from the system --}}
                    @php
                        $no_suggested_people = false;
                    @endphp
                    @if (count($suggested_people) > 0)
                        @foreach ($suggested_people as $people)
                            <x-people :people="$people" />
                        @endforeach
                    @else
                        <p class="text-red-600 text-center font-semibold my-2">Nothing to show</p>
                        @php
                            $no_suggested_people = true;
                        @endphp
                    @endif
                </div>
                @if (!$no_suggested_people)
                    <div class="pt-3 px-4">
                        <a class="flex text-stone-600 hover:text-stone-900 text-sm" href="{{ route('friends') }}">
                            <span class="font-semibold">View all</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M9.47 15.28a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 1 0-1.06-1.06L10 13.69 6.28 9.97a.75.75 0 0 0-1.06 1.06l4.25 4.25ZM5.22 6.03l4.25 4.25a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 0 0-1.06-1.06L10 8.69 6.28 4.97a.75.75 0 0 0-1.06 1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

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
        });
    </script>
@endpush
