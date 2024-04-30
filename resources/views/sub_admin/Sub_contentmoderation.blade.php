@include('sub_admin.Sub_sidenavbar')
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

    .text-red {
        color: red;
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Reported Content </b></h1>
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
                                          <th>Student_id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Reported_content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($usersWithReports as $user)
                                        <tr>
                                          <td>{{ $user->student_id }}</td>
                                          <td>{{ $user->name }}</td>
                                          <td>{{ $user->email }}</td>

                                         
                                          <td><a href="{{ route('subadmin.reportedContent_view',['id' => $user->student_id]) }}">
                                            <button type="button"class="btn btn-success">View</button></a></td>
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
