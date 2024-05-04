@include('super_admin.sidenavbar')

<style>
    /* Custom CSS to style the magenta button */
    .btn-magenta {
        color: black;
        /* Text color */
        background-color: #e600e6;
        /* Lighter magenta color */
        border-color: #ff69b4;
        /* Border color */
    }
</style>

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

@if (Session::has('error'))
    <script>
        Swal.fire({
            title: "Message",
            text: "{{ Session::get('error') }}",
            icon: 'error',
            showConfirmButton: true
        });
    </script>
@endif

<div class="content-wrapper all">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Support/View</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="team-members">

                            </div>
                            <br>
                            @php
                              $count=1;
                            @endphp
                            @foreach($queries as $query)
                            <span>
                                <h2 style="color:rgb(20, 103, 228);">Quries : {{$count}}</h2>
                            </span>
                            <br>
                            <div>
                                <p>{{ $query->query }}</p>
                                <form method="POST" action="{{ route('viewsupport.submit') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $query->id }}">
                                    <textarea name="reply" style="width: 100%; height: 60px;"></textarea>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <hr> <!-- Add a horizontal line between each query -->
                            @php
                              $count++;
                            @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
