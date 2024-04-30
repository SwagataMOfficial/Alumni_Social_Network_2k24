@include('sub_admin.sub_sidenavbar')

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
        swal("Message", "{{ Session::get('success') }}", 'success', {
            button: true,
            button: "OK",
        })
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
                                    <!--First-->
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
                                                            <div
                                                                style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                                                <img src="{{ asset('/storage/' . $post->attachment) }}"
                                                                    alt="upload posts"
                                                                    style="width: 90%; height: auto;">
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
                                                            href="{{ route('subadmin.ReportedContent_view_delete', ['id' => $post->post_id]) }}">
                                                            <button class="btn btn-danger mt-3 mr-2">Delete</button>
                                                        </a>
                                                        <a
                                                            href="{{ route('subadmin.ReportedContent_view_suspend', ['id' => $post->post_id]) }}">
                                                            <button class="btn btn-secondary mt-3">Suspend</button>
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
