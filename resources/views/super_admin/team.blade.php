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
                    <h1 class="m-0"><b>Team</b></h1>
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
                                <span>
                                    <h2>List Of Team Members</h2>
                                </span>
                                <span><a href="{{ route('teamadd') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                            <path
                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path
                                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                                        </svg></a>
                                </span>
                            </div>


                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr style="color:rgb(20, 103, 228)">
                                            <th>ID No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($subAdmins as $subAdmin)
                                      <tr>
                                          <td>{{ $subAdmin->id }}</td>
                                          <td>{{ $subAdmin->name }}</td>
                                          <td>{{ $subAdmin->email }}</td>
                                          <td>{{ $subAdmin->decryptedPassword }}</td>
                                          <td>
                                            <button type="button" class="btn btn-danger" onclick="deleteSubAdmin({{ $subAdmin->id }})">Remove</button>
                                            
                                            <a
                                                href="{{ route('admin_team_changePassword', ['id' => $subAdmin->id ]) }}"><button type="button" class="btn btn-secondary">Change Password</button></td>
                                          </a> 
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
</div>
<script>
    function deleteSubAdmin(id) {
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
                window.location.href = "{{ route('admin_team_remove', ['id' => ':id']) }}".replace(':id', id);
            }
        });
    }
</script>