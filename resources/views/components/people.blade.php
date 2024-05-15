<div class="flex justify-between items-center gap-4 w-full">
    <div class="flex gap-4">
        <a href="/profile/{{ $people['remember_token'] }}"
            class="w-12 border-2 border-stone-500 aspect-square rounded-[50%] overflow-hidden">
            <img class="w-full h-full object-cover object-center" src="{{ asset('/storage/' . $people['profile_picture']) }}"
                alt="profile image">
        </a>
        <div class="flex flex-col justify-center select-none">
            <p class="text-sm font-semibold text-stone-600">{{ $people['name'] }}</p>
            <p class="text-xs font-medium text-stone-500">
                {{-- Student at techno idnia hooghly --}}
                @if ($people['about'] != null)
                    @if (strlen($people['about']) > 35)
                        {{ substr($people['about'], 0, 35) }}{{ '....' }}
                    @else
                        {{ $people['about'] }}
                    @endif
                @else
                    {{ 'Not set' }}
                @endif
            </p>
        </div>
    </div>
    <a href="javascript:void(0);" data-send-link="{{ route('friend.request', ['token' => $people['remember_token']]) }}"
        class="flex items-center text-stone-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            class="w-5 h-5 hover:cursor-pointer hover:text-stone-900">
            <path
                d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
        </svg>
    </a>
</div>
