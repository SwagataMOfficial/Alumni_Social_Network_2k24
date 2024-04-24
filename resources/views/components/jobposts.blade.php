<div class="container mx-auto mt-4 lg:w-full">
    @if (count($posts) != 0)
        @foreach ($posts as $index => $post)
            <x-profilejobview :details="$post['get_user']" :likeduser="$post['get_liked_user']" :posts="$post" :key="$index" />
        @endforeach
    @else
        <div class="rounded-lg overflow-hidden mx-auto mb-4">
            <h1 class="text-red-600 font-semibold text-center py-5 text-2xl">No Posts Are Available</h1>
        </div>
    @endif
</div>