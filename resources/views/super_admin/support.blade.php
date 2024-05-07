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

<div class="content-wrapper all">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Support </b></h1>
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
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->student_id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><a href="{{ route('viewsupport',['id' => $user->student_id]) }}">
                                                    <button type="button" class="btn btn-success">View</button>
                                                </a>
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
