@php
    // generating date
    use Carbon\Carbon;

    $formattedDate = Carbon::parse($comments['created_at'])->format('F d, Y');
@endphp

<div class="mb-2 relative" id="comment_wrapper_{{$key}}">
    <div class="flex items-start mb-2">
        <div class="flex-shrink-0 mt-1">
            <a href="/profile/{{ $userdetails['remember_token'] }}" class="block h-10 w-10 rounded-full overflow-hidden">
                <img class="w-full h-full object-cover" src="{{ asset('/storage/' . $userdetails['profile_picture']) }}"
                    alt="user profile">
            </a>
        </div>
        <div class="ml-4">
            <p class="text-gray-800 font-semibold">{{ $userdetails['name'] }}</p>
            <p class="text-gray-600 text-sm">{{ $comments['comment'] }}</p>
            <p class="text-gray-500 text-xs">{{ $formattedDate }}</p>
        </div>

        @if ($comments['posted_by'] == session()->get('user_id'))
            <button id="commentDropdown_{{ $key }}_{{$index}}" data-dropdown-toggle="dropdown_comment_{{ $key }}_{{$index}}"
                class="absolute top-2 right-2 text-gray-500 hover:text-blue-700 focus:outline-none" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                </svg>
            </button>
        @endif
    </div>
</div>

@if ($comments['posted_by'] == session()->get('user_id'))
    <!-- Dropdown menu -->
    <div id="dropdown_comment_{{ $key }}_{{$index}}"
        class="z-10 hidden bg-gray-50 divide-y divide-gray-100 rounded-lg shadow w-44 ">
        {{-- this commented button below supports ajax call --}}
        {{-- <div class="py-2 text-sm text-gray-700" aria-labelledby="commentDropdown_{{ $key }}_{{$index}}">
            <button data-link-address="{{ route('comments.delete', ['id' => $comments['comment_id']]) }}" type="button"
                data-comment-item="comment_wrapper_{{$key}}" class="px-4 py-2 hover:bg-gray-200 hover:text-black text-left w-full">
                Delete
            </button>
        </div> --}}
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="commentDropdown_{{ $key }}_{{$index}}">
            <li>
                <form class="hidden" id="form_delete_comment_{{ $key }}_{{$index}}" action="{{ route('comments.delete', ['id' => $comments['comment_id']]) }}" method="POST">
                    @csrf
                    {{-- this code below interprets the form as it is a DELETE request form --}}
                    @method('DELETE')
                </form>
                <button type="submit" form="form_delete_comment_{{ $key }}_{{$index}}" class="px-4 py-2 hover:bg-gray-200 hover:text-black text-left w-full">
                    Delete
                </button>
            </li>
        </ul>
    </div>
@endif
