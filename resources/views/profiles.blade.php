@extends('layouts.main')
@push('title')
    <title>Profile-Name | Alumni Junction</title>
@endpush
@section('main-section')
    {{-- <div class="container bg-gray-200 min-h-[calc(100vh-67px)]"> --}}
    <div class="container">
        <div class="px-8 mx-auto pt-3 flex justify-center gap-10">
            <div class="w-3/4">
                <div class="rounded-xl overflow-hidden relative mb-3">


                    <img class="w-full h-40 object-cover" src="{{ asset('/storage/' . $user['cover_picture']) }}"
                        alt="background image" id="profile-cover">

                    <img class="absolute top-16 left-8 z-10 w-32 aspect-square rounded-[50%] object-cover outline outline-white"
                    src="{{ asset('/storage/' . $user['profile_picture']) }}" alt="profile picture"
                        id="profile-picture">



                    <x-profilesection :details="$user" />
                </div>
                <div class="rounded-xl overflow-hidden bg-white pb-4">
                    <h3 class="text-black font-bold text-2xl pl-8 pt-3">
                        @if (Request::is('profile/home/*'))
                            {{ 'About me' }}
                        @else
                            {{ 'Activity' }}
                        @endif
                    </h3>
                    <nav class="pl-12 mt-4 flex gap-4">
                        @if (Request::is('profile/home/*'))
                            <a href="{{ url('/') }}/profile/home/{{ Session::get('token') }}"
                                class="bg-sky-200 border-2 border-cyan-500 px-6 py-1 rounded-3xl hover:bg-lime-200 hover:border-green-500 font-semibold"
                                data-active="true">About</a>
                        @else
                            <a href="{{ url('/') }}/profile/home/{{ Session::get('token') }}"
                                class="bg-lime-200 border-2 border-green-500 px-6 py-1 rounded-3xl hover:bg-sky-200 hover:border-cyan-500 font-semibold">About</a>
                        @endif

                        @if (Request::is('profile/posts/*'))
                            <a href="{{ url('/') }}/profile/posts/{{ Session::get('token') }}"
                                class="bg-sky-200 border-2 border-cyan-500 px-6 py-1 rounded-3xl hover:bg-lime-200 hover:border-green-500 font-semibold"
                                data-active="true">Posts</a>
                        @else
                            <a href="{{ url('/') }}/profile/posts/{{ Session::get('token') }}"
                                class="bg-lime-200 border-2 border-green-500 px-6 py-1 rounded-3xl hover:bg-sky-200 hover:border-cyan-500 font-semibold">Posts</a>
                        @endif

                        @if (Request::is('profile/images/*'))
                            {{--  --}}
                            <a href="{{ url('/') }}/profile/images/{{ Session::get('token') }}"
                                class="bg-sky-200 border-2 border-cyan-500 px-6 py-1 rounded-3xl hover:bg-lime-200 hover:border-green-500 font-semibold"
                                data-active="true">Images</a>
                        @else
                            {{--  --}}
                            <a href="{{ url('/') }}/profile/images/{{ Session::get('token') }}"
                                class="bg-lime-200 border-2 border-green-500 px-6 py-1 rounded-3xl hover:bg-sky-200 hover:border-cyan-500 font-semibold">Images</a>
                        @endif

                        @if (Request::is('profile/jobs/*'))
                            {{--  --}}
                            <a href="{{ url('/') }}/profile/jobs/{{ Session::get('token') }}"
                                class="bg-sky-200 border-2 border-cyan-500 px-6 py-1 rounded-3xl hover:bg-lime-200 hover:border-green-500 font-semibold"
                                data-active="true">Jobs</a>
                        @else
                            {{--  --}}
                            <a href="{{ url('/') }}/profile/jobs/{{ Session::get('token') }}"
                                class="bg-lime-200 border-2 border-green-500 px-6 py-1 rounded-3xl hover:bg-sky-200 hover:border-cyan-500 font-semibold">Jobs</a>
                        @endif
                    </nav>
                    @if ($user['profile_visibility'] || $user['student_id'] == session()->get('user_id'))
                        {{-- true means it will show actual profile content otherwise the else part --}}
                        @if (Request::is('profile/home/*'))
                            <x-aboutprofile :details="$user" />
                        @endif

                        @if (Request::is('profile/posts/*'))
                            <x-posts :details="$user" />
                        @endif

                        @if (Request::is('profile/images/*'))
                            <x-postgallery :details="$user" />
                        @endif

                        @if (Request::is('profile/jobs/*'))
                            <x-jobposts :details="$user" />
                        @endif
                    @else
                        <x-privacy />
                    @endif
                </div>
            </div>
            {{-- comment --}}
            <div class="w-1/4 rounded-xl h-fit bg-white px-4 py-3">
                <h3 class="font-bold text-stone-700">More Peoples for You</h3>
                <div class="flex flex-col gap-3 items-center justify-center mt-2">
                    @for ($i = 1; $i <= 4; $i++)
                        <x-people username="Swagata Mukherjee" about="Student at Techno India Hooghly"
                            imageLink="default/avatar.jpg" />
                    @endfor
                </div>
                <div class="pt-3 px-4">
                    <a class="flex text-stone-600 hover:text-stone-900 text-sm" href="#">
                        <span class="font-semibold">View all</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M9.47 15.28a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 1 0-1.06-1.06L10 13.69 6.28 9.97a.75.75 0 0 0-1.06 1.06l4.25 4.25ZM5.22 6.03l4.25 4.25a.75.75 0 0 0 1.06 0l4.25-4.25a.75.75 0 0 0-1.06-1.06L10 8.69 6.28 4.97a.75.75 0 0 0-1.06 1.06Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('script')
<script>
    $(document).ready(function() {
        $("#visibility_input").change(() => {
            // alert("Visibility Changed");
            $("#visibility_form").submit();
        });

        $("#visibility_form").submit((e)=>{
            e.preventDefault();
            $("#visibility_input").prop("disabled");
            // alert('submitting form');
            // Submitting the form through ajax
            $.ajax({
                url: "{{ route('profile.visibility') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $("#visibility_input").removeAttr("disabled");
                    alert("Data=", response.json());
                },
                error: function(xhr, status, error) {
                    alert('error:', error);
                }
            });
        });
    });
</script>
@endpush --}}
