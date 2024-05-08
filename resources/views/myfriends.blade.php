@extends('layouts.main')
@push('title')
    <title>Friends - {{ session()->get('user_name') }} | Alumni Junction</title>
@endpush

@section('main-section')

    <div class="max-[426px]:px-2 px-4 xl:px-8 mx-auto pt-3 flex justify-center lg:gap-6 xl:gap-10">
        <div class="w-full lg:w-3/4 bg-white rounded-xl px-4 pt-3 pb-6 h-max">
            <h3 class="text-2xl font-bold text-stone-700 mb-3">My Friends</h3>
            {{-- my friends cards will appear here --}}
            @if (count($myfriends) > 0)
                <div class="grid grid-cols-1 gap-3 min-[425px]:grid-cols-2 md:grid-cols-3 min-[1380px]:grid-cols-5">
                    {{-- cards --}}
                    @foreach ($myfriends as $friend)
                        <div
                            class="rounded-xl bg-slate-200 overflow-hidden relative flex flex-col justify-start items-center">
                            <img src="{{ asset('/storage/' . $friend['get_friend']['cover_picture']) }}" alt="cover photo"
                                class="object-cover max-h-16 w-full">
                            <a href="/profile/{{ $friend['get_friend']['remember_token'] }}"
                                class="absolute top-7 w-20 aspect-square object-cover rounded-[50%] border-2 border-slate-600 overflow-hidden">
                                <img src="{{ asset('/storage/' . $friend['get_friend']['profile_picture']) }}"
                                    alt="profile photo" class="w-full h-full">
                            </a>
                            <p class="mt-14 font-semibold text-xl text-center">{{ $friend['get_friend']['name'] }}</p>
                            <p class="text-md py-1">Passout year - {{ $friend['get_friend']['graduation_year'] }}</p>
                            <div class="flex gap-3">
                                <a href="{{ route('messages', ['token' => $friend['get_friend']['remember_token']]) }}"
                                    class="text-sm p-2 mt-1 rounded-xl bg-green-500 hover:bg-green-600 border-[3px] border-green-800 mb-3 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M10 3c-4.31 0-8 3.033-8 7 0 2.024.978 3.825 2.499 5.085a3.478 3.478 0 0 1-.522 1.756.75.75 0 0 0 .584 1.143 5.976 5.976 0 0 0 3.936-1.108c.487.082.99.124 1.503.124 4.31 0 8-3.033 8-7s-3.69-7-8-7Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-2-1a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0);"
                                    data-remove-link="{{ route('friend.remove', ['id' => $friend['get_friend']['student_id']]) }}"
                                    class="text-sm p-2 mt-1 rounded-xl bg-red-500 hover:bg-red-600 border-[3px] border-red-900 mb-3 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-5 h-5">
                                        <path
                                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM2.046 15.253c-.058.468.172.92.57 1.175A9.953 9.953 0 0 0 8 18c1.982 0 3.83-.578 5.384-1.573.398-.254.628-.707.57-1.175a6.001 6.001 0 0 0-11.908 0ZM12.75 7.75a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 0-1.5h-5.5Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-xl mx-2 text-red-500">You don't have any friends!</p>
                <a href="{{ route('friends') }}"
                    class="rounded-3xl w-max my-2 ml-2 px-6 py-2 font-bold tracking-wide bg-blue-600 text-white hover:bg-blue-700 flex items-center gap-2">Find
                    a friend</a>
            @endif

        </div>
        {{-- more peoples to follow section --}}
        <div class="w-1/4 rounded-xl h-fit bg-white px-4 py-3 hidden lg:block">
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

            // HANDLING REMOVING FRIEND
            $('a[data-remove-link]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();

                    // getting the url
                    const URL = $(element).attr("data-remove-link");

                    // Display confirmation alert
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you really want to unfriend this user?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, proceed with AJAX request to unfriend
                            $.ajax({
                                url: URL,
                                method: 'GET',
                                success: function(response) {
                                    // Handle the AJAX response here
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Unfriend Successfully!',
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
                        }
                    });
                });
            });
        });
    </script>
@endpush
