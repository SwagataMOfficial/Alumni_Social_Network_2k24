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
                        src="{{ asset('/storage/' . $user['profile_picture']) }}" alt="profile picture" id="profile-picture">

                    <x-profilesection :details="$user" />
                </div>
                <div class="rounded-xl overflow-hidden bg-white pb-4 pt-2">
                    <nav class="pl-12 mt-4 flex gap-4" id="default-styled-tab"
                        data-tabs-toggle="#default-styled-tab-content"
                        data-tabs-active-classes="bg-sky-200 hover:bg-lime-200 hover:border-green-500 border-cyan-500"
                        data-tabs-inactive-classes="bg-lime-200 border-green-500 hover:bg-sky-200 hover:border-cyan-500"
                        role="tablist">

                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="profile-styled-tab"
                            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">About</button>


                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="dashboard-styled-tab"
                            data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard"
                            aria-selected="false">Posts</button>


                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="settings-styled-tab"
                            data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings"
                            aria-selected="false">Images</button>


                        <button class="rounded-3xl border-2 font-semibold px-6 py-1" id="contacts-styled-tab"
                            data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts"
                            aria-selected="false">Jobs</button>

                    </nav>

                    @if ($user['profile_visibility'] || $user['student_id'] == session()->get('user_id'))
                        <div id="default-styled-tab-content">
                            <div class="hidden" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    <x-aboutprofile :details="$user" />
                                </p>
                            </div>
                            <div class="hidden" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    <x-posts :details="$user" :posts="$posts" />
                                </p>
                            </div>
                            <div class="hidden" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    <x-postgallery :details="$imgArr" />
                                </p>
                            </div>
                            <div class="hidden" id="styled-contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    <x-jobposts :details="$user" :posts="$jobs" />
                                </p>
                            </div>
                        </div>
                    @else
                        <x-privacy />
                    @endif
                </div>
            </div>

            {{-- more peoples to follow section --}}
            <div class="w-1/4 rounded-xl h-fit bg-white px-4 py-3">
                <h3 class="font-bold text-stone-700">More Peoples for You</h3>
                <div class="flex flex-col gap-3 items-center justify-center mt-2">

                    {{-- getting all the suggested people from the system --}}

                    @foreach ($suggested_people as $people)
                        <x-people :people="$people" />
                    @endforeach
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
@push('script')
    <script>
        $(document).ready(function() {
            $('#visibility_input').change(function() {
                var visibility = $(this).prop('checked') ? 1 : 0;
                $.ajax({
                    url: "{{ route('profile.visibility') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        profile_visibility: visibility
                    },
                    success: function(response) {
                        console.log(response.message);
                        location.reload();

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);

                    }
                });
            });
        });
        // $(document).ready(function() {
        // $("#visibility_input").change(() => {
        // // alert("Visibility Changed");
        // $("#visibility_form").submit();
        // });

        // $("#visibility_form").submit((e)=>{
        // e.preventDefault();
        // $("#visibility_input").prop("disabled");
        // // alert('submitting form');
        // // Submitting the form through ajax
        // $.ajax({
        // url: "{{ route('profile.visibility') }}",
        // method: "POST",
        // data: $(this).serialize(),
        // success: function(response) {
        // $("#visibility_input").removeAttr("disabled");
        // alert("Data=", response.json());
        // },
        // error: function(xhr, status, error) {
        // alert('error:', error);
        // }
        // });
        // });
        // });
    </script>
@endpush
