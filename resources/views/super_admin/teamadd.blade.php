@include('super_admin.sidenavbar')

<style>
    .form-container {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 30px;
        margin: 20px auto;
        max-width: 500px;
        background-color: #87CEEB;

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

@if (Session::has('email_error'))
    <script>
        Swal.fire({
            title: 'Message',
            text: "{{ Session::get('email_error') }}",
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

    <div class="sky-background">
        <div class="container">
            <div class="row md-8">
                <div class="col-md-10 form-container">

                    <form action="{{ url('/') }}/admin/teamMemberadd" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputname" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputname"
                                    placeholder="Name">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" name="email"class="form-control" id="inputEmail"
                                    placeholder="Email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword"
                                    placeholder="Password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-10 offset-sm-5">
                                <button type="submit" class="btn btn-primary">Add</button>

                                {{-- <button type="cancel" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
