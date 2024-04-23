@extends('layouts.main')
@push('title')
    <title>Home | Alumni Junction</title>
@endpush
@section('main-section')
    {{-- <div class="container bg-gray-200 min-h-[calc(100vh-67px)]"> --}}
    <div class="container">
        <div class="px-8 mx-auto py-3">
            <div class="bg-white min-h-[86.9vh] w-full flex flex-col items-center gap-3 py-2 rounded-xl overflow-auto">
                @if (count($notifications) == 0)
                    <h1 class="text-stone-600 font-bold text-3xl mx-5 my-2">No new notifications</h1>
                @else
                    @foreach ($notifications as $item)
                        <a href="{{ $item['link'] }}"
                            class="w-full px-6 py-2 text-xl hover:bg-slate-200 flex justify-between items-center group">
                            <span class="font-semibold">{{ $item['title'] }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-6 h-6 group-hover:translate-x-2 transition-all ease-in duration-200">
                                <path fill-rule="evenodd"
                                    d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
