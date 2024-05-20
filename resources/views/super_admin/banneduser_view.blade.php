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
                                    <h2>Baned User All Deleted Post</h2>
                                    @foreach ($userPosts as $post)
                                        @if ($post->delete_post == 1)
                                            <div class="col-md-12 mb-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <div class="position-relative">
                                                                <!-- Assuming $user['profile_picture'] exists -->
                                                                <img src="{{ asset('/storage/' . $user['profile_picture']) }}"
                                                                    alt="Profile Pic" class="rounded-circle mr-2"
                                                                    width="50" height="50"
                                                                    style="object-fit: cover; object-position: center;">
                                                            </div>
                                                            <!-- Display post content -->
                                                            <span class="card-text"
                                                                style="font-size: 20px">{{ $post->post_description }}</span>
                                                        </div>
                                                        <!-- Additional post details based on post type -->
                                                        @if ($post->post_type == 'post' && $post->attachment)
                                                            <!-- contents img posts -->
                                                            <div id="carouselExample{{ $loop->index }}"
                                                                class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    @foreach (explode('||', $post->attachment) as $index => $attachment)
                                                                        <div
                                                                            class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                                                                            <img src="{{ asset('/storage/' . $attachment) }}"
                                                                                class="d-block w-100"
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
                                                        @elseif ($post->post_type == 'job')
                                                            <div>
                                                                <p><strong>Job Description:</strong>
                                                                    {{ $post->post_description }}</p>
                                                                <p><strong>Job Link:</strong> <a
                                                                        href="{{ $post->registration_link }}"
                                                                        target="_blank">{{ $post->registration_link }}</a>
                                                                </p>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
