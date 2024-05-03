@extends('layouts.main')
@push('title')
    <title>Find | Alumni Junction</title>
@endpush

@section('main-section')

    <div class="px-8 mx-auto pt-3 flex justify-center gap-10">
        <div class="w-3/4 bg-white rounded-xl px-4 py-3">
            <h3 class="text-2xl font-bold text-stone-700 mb-3">My Friends</h3>
            {{-- my friends cards will appear here --}}
            @if (count($searchedData) > 0)
                <div class="grid grid-cols-5 gap-3">
                    {{-- cards --}}
                    @foreach ($searchedData as $data)
                        <div
                            class="rounded-xl bg-slate-200 overflow-hidden relative flex flex-col justify-start items-center">
                            <img src="/storage/default/cover.png" alt="cover photo" class="object-cover max-h-16 w-full">
                            <a href="/profile/{{ $data['remember_token'] }}"
                                class="absolute top-7 w-20 aspect-square object-cover rounded-[50%] border-2 border-slate-600 overflow-hidden">
                                <img src="/storage/default/avatar.jpg" alt="profile photo" class="w-full h-full">
                            </a>
                            <p class="mt-14 font-semibold text-xl">{{ $data['name'] }}</p>
                            <p class="text-md py-1">Passout year - {{ $data['graduation_year'] }}</p>
                            <a href="{{ route('friend.request', ['token' => $data['remember_token']]) }}"
                                class="text-sm px-3 py-2 mt-1 rounded-xl bg-indigo-500 hover:bg-indigo-600 border-[3px] border-indigo-900 mb-3 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path
                                        d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-xl mx-2 text-red-500">No user found!</p>
            @endif

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
                <a class="flex text-stone-600 hover:text-stone-900 text-sm" href="{{ route('friends') }}">
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
@endsection