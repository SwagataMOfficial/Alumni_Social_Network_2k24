@if (count($details) != 0)
    <div class="mx-16 mt-4 gap-6 grid grid-cols-4">
        @foreach ($details as $img)
            <a href="#" class="hover:opacity-90">
                <img class="w-auto aspect-square rounded-2xl object-cover" src="{{ asset('/storage/' . $img) }}"
                    alt="posted image">
            </a>
        @endforeach
    </div>
@else
    <h1 class="text-center text-red-500 font-semibold text-3xl mt-6 mb-2">User haven't posted anything yet</h1>
@endif
