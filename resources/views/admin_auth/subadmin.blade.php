@extends('layouts.app')

@section('title', 'Sub Admin_Login')

@section('content')

<!-- Body Background Image  -->

<body class="max-h-screen" style="background-image: url('{{ asset('images/sub_admin_background.png') }}'); 
background-size: cover;
background-position: center;
background-repeat: no-repeat;
backdrop-filter: blur(1px);">
    <section class="border-red-500  min-h-screen flex items-center justify-center">

        <img src="{{asset('images/sub_Alumni_logo.png')}}" alt="Logo" class="absolute top-0 left-0  h-16 mt-3 ml-3" />
        <!-- Row  -->

        <div class="bg-gray-200 p-5 flex rounded-2xl shadow-lg max-w-3xl">
            <!-- Left Portion  -->

            <div class="w-1/2 md:block hidden">
                <p class="text-red-500 font-medium ml-6" style="font-size: 25px;">Sub Admin Login</p>
                <!-- Vector Image  -->
                <img class="" src="{{asset('images/sub_man_image.png')}}" alt="pictire">
            </div>

            <!-- Right Portion  -->
            <div class="md:w-1/2 px-5">
                <div id="adminloginalert"></div>
                <!-- Form Section  -->
                <form class="max-w-sm mx-auto mt-10" action="" method="post" id="sub_admin_login_form">
                    @csrf
                    <!-- Email Section  -->
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-500">Email</label>
                        <input type="email" name="sub_admin_email" id="sub_admin_email"
                            class="border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5  dark:placeholder-gray-400 dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="name@gmail.com" required />
                    </div>
                    <!-- Password Section  -->
                    <div class="mb-5 mt-10">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-500">Your password</label>
                        <input type="password" name="sub_admin_password" id="sub_admin_password"
                            class="border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-red-500 dark:focus:border-red-500"
                            required />
                    </div>
                   
                    <!-- Log in Button Section  -->
                    <button type="submit" id="login_btn"
                        class="mt-10 text-white font-medium rounded-full text-sm w-full xxl:w-auto px-5 py-2.5 text-center bg-red-500 dark:hover:bg-red-700 dark:focus:ring-blue-800 hover:scale-95 duration-300">log
                        in</button>

                </form>
            </div>
        </div>
    </section>
</body>

</html>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $('#sub_admin_login_form').submit(function(e) {

                e.preventDefault();
                $("#login_btn").text("Please Wait......");
                $.ajax({
                    url: "{{ route('subadmin.login') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        // Redirect to a different page upon successful login
                        console.log(response)
                        $('#sub_admin_login_form')[0].reset();
                        // Reset the button text
                        $("#login_btn").text("Submit");
                        window.location.href = "{{ route('sub.admin.dashboard') }}";
                    },
                    error: function(xhr, status, error) {
                        // Parse the error response JSON
                        var errors = JSON.parse(xhr.responseText).errors;
                        console.log(error);
                        // Show error alerts
                        Object.keys(errors).forEach(function(key) {
                            showAlert('error', errors[key][0]);
                            $("#login_btn").text("Log In");
                        });

                    }
                });
            });

            function showAlert(type, message) {
                var alertClass = type === 'success' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700';
                var alertHtml = '<div class="p-2 mb-2 rounded-md ' + alertClass + '">' +
                    '<p class="text-sm">' + message + '</p>' +
                    '</div>';
                $('#adminloginalert').append(alertHtml);
                // Remove the alert after 5 seconds
                setTimeout(function() {
                    $('#adminloginalert').empty();
                }, 5000);
            }
        });
    </script>
@endsection