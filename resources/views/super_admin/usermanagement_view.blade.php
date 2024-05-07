@include('super_admin.sidenavbar')

<style>
    .team-members {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media (max-width: 768px) {
        .team-members {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    .all {
        background-color: rgba(255, 255, 255, 0.5);
        /* white color with 50% opacity */
    }

    .online-dot {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 15px;
        height: 15px;
        background-color: green;
        border-radius: 50%;
        border: 2px solid white;
    }


    /* Custom CSS for Bootstrap Carousel */
    .image-fit {
    object-fit: cover;
    max-width: 100%;
    max-height: 100%;
}
.carousel-container {
    max-width: 600px; /* Adjust the maximum width as needed */
    max-height: 400px; /* Adjust the maximum height as needed */
    margin: 0 auto; /* Center the carousel horizontally */
}
</style>
@if (Session::has('success'))
    <script>
        Swal.fire({
            title: "Message",
            text: "{{ Session::get('success') }}",
            icon: 'success',
            showConfirmButton: true
        });
    </script>
@endif

<div class="content-wrapper all">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="team-members">
                                <div class="container mt-2">
                                    <h2>All Posts</h2>
                                    @foreach ($userPosts as $post)
                                        <div class="col-md-12 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="position-relative">
                                                            <img src="{{ asset('/storage/' . $user['profile_picture']) }}"
                                                                alt="Profile Pic" class="rounded-circle mr-1"
                                                                width="50">
                                                        </div>
                                                        <!-- contents written -->
                                                        <span class="card-text"
                                                            style="font-size: 16px">{{ $post->post_description }}</span>
                                                    </div>
                                                    @if ($post->post_type == 'post')
                                                        @if ($post->attachment)
                                                            <!-- contents img posts -->
                                                            <div id="carouselExample{{ $loop->index }}"
                                                                class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    @foreach (explode('||', $post->attachment) as $index => $attachment)
                                                                        <div
                                                                            class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                                                            <img src="{{ asset('/storage/' . $attachment) }}"
                                                                                class="d-block w-100 image-fit"
                                                                                alt="Image {{ $index }}">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <a class="carousel-control-prev"
                                                                    href="#carouselExample{{ $loop->index }}"
                                                                    role="button" data-slide="prev">
                                                                    <span class="carousel-control-prev-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                </a>
                                                                <a class="carousel-control-next"
                                                                    href="#carouselExample{{ $loop->index }}"
                                                                    role="button" data-slide="next">
                                                                    <span class="carousel-control-next-icon"
                                                                        aria-hidden="true"></span>
                                                                    <span class="sr-only">Next</span>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @elseif ($post->post_type == 'job')
                                                        <!-- job post details -->
                                                        <div>
                                                            <p><strong>Job Description:</strong>
                                                                {{ $post->post_description }}</p>
                                                            <p><strong>Job Link:</strong> <a
                                                                    href="{{ $post->registration_link }}"
                                                                    target="_blank">{{ $post->registration_link }}</a>
                                                            </p>
                                                        </div>
                                                    @endif

                                                    <!-- Post buttons -->
                                                    <div class="post-buttons d-flex justify-content-center">
                                                        <a
                                                            href="{{ route('usermanagementview_delete', ['id' => $post->post_id]) }}">
                                                            <button class="btn btn-danger mt-3 mr-2">Delete
                                                                Post</button>
                                                        </a>
                                                        <a
                                                            href="{{ route('usermanagementview_suspend', ['id' => $post->post_id]) }}">
                                                            <button class="btn btn-secondary mt-3">Suspend
                                                                Account</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
