<div class="mx-16 mt-4 gap-6 grid grid-cols-4">
    {{-- actual data will have foreach loop to generate images --}}
    {{-- for temporary data generation --}}
    @for ($i = 1; $i <= 7; $i++)
        <a href="{{ url('/') }}/post/1" class="hover:opacity-90">
            <img class="w-auto aspect-square rounded-2xl" src="/storage/cover.jpg"
                alt="posted image">
        </a>
    @endfor
</div>