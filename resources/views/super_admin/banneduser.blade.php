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

    .btn-magenta:hover {
        background-color: #ff69b4;
        /* Darker magenta on hover */
        border-color: #e600e6;
        /* Darker border on hover */
    }
</style>

</style>
@if (Session::has('success'))
    <script>
        Swal.fire({
            title: 'Message',
            text: "{{ Session::get('success') }}",
            icon: 'success',
            showConfirmButton: true
        });
    </script>
@endif
@if (Session::has('error'))
    <script>
        Swal.fire({
            title: 'Message',
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
                    <h1 class="m-0"><b>Banned User </b></h1>
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


                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr style="color:rgb(20, 103, 228)">
                                            <th>ID No.</th>
                                            <th>Name</th>
                                            <th>Mail Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banuser as $user)
                                        <tr>
                                            <td>{{ $user->student_id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>

                                            <td>
                                                <a
                                                href="{{ route('userban_unban', ['id' => $user->student_id]) }}"><button type="button" class="btn btn-magenta">Unban Account</button></a>

                                                <button type="button" class="btn btn-primary" onclick="deleteUser({{ $user->student_id }})">Delete Account</button>
                                                <a
                                                href="{{ route('userban_view', ['id' => $user->student_id]) }}"><button type="button" class="btn btn-success">View</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function deleteUser(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Once deleted, you will not be able to recover this record!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('userban_delete', ['id' => ':id']) }}".replace(':id', id);
                }
            });
        }
    </script>