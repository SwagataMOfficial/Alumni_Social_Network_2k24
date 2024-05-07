@include('super_admin.sidenavbar')

<style>
    .custom-container {
        background-color: #c5d1e3;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input {
        width: 100%;
    }

    .btn-magenta {
        color: black;
        background-color: #7068ac;
        border-color: #7c60e1;
        color: white;
    }

    form i {
        margin-left: -30px;
        cursor: pointer;
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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2><b>Change Password</b></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="custom-container">

                    <form action="{{ url('/admin/team/updatePassword/' . $id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group">
                            <label for="">Current Password:</label>
                            <input type="password" id="" name="current-password">
                            <span class="text-danger">
                                @error('current-password')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="">New Password:</label>
                            <input type="password" id="" name="new-password">
                            <span class="text-danger">
                                @error('new-password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm New Password:</label>
                            <input type="password" id="" name="new-password_confirmation">
                            <span class="text-danger">
                                @error('new-password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        
                        <button type="submit" class="btn btn-magenta">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
