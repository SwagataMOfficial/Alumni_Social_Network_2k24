@extends('layouts.main')

@push('title')
    <title>Login | Alumni Junction</title>
@endpush

@section('main-section')
    <!-- Body Background Image  -->

    <div class="max-h-screen"
        style="background-image: url('{{ asset('images/login_background_img.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; backdrop-filter: blur(1px);">
        <section class="border-red-500  min-h-screen flex items-center justify-center">
            <!-- Brand Logo  -->

            <div id="signInFormContainer">
                <!-- Sign-in form code goes here -->

                <!-- Row  -->

                <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
                    <!-- Left Portion  -->

                    <div class="w-1/2 md:block hidden">
                        <img src="{{ asset('images/brand_logo.png') }}" alt="Logo" class="h-16" />

                        <!-- tagline  -->
                        <p class="ml-5" style="font-size: 12px;">Connecting Alumni, Fostering Memories,<br> and Powering
                            Success in
                            Your
                            Alumni Life ....</p>
                        <!-- Vector Image  -->
                        <img class="" src="{{ asset('images/login_man_door_img.png') }}" alt="picture">

                    </div>

                    <!-- Right Portion  -->
                    <div class="md:w-1/2 px-5">
                        <div id="loginalert"></div>
                        <!-- Form Section  -->
                        <form class="max-w-sm mx-auto" action="" method="post" id="login_form">
                            @csrf
                            <!-- Email Section  -->
                            <div class="mb-8">
                                <label for="identifier" class="block mb-2 text-sm font-medium text-gray-500">Email or
                                    Student ID</label>
                                <input type="text" name="identifier" id="identifier"
                                    class="border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@gmail.com or Student ID" required />
                            </div>
                            <!-- Password Section  -->
                            <div class="mb-8">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-500">Your
                                    password</label>
                                <input type="password" name="password" id="password"
                                    class="border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <!-- Forgot Password  -->
                            <div class="flex items-start mb-8">
                                <label for="remember" class="ms-2 text-sm font-medium text-blue-600"><a
                                        href="{{ route('forgot') }}">Forgot
                                        Password?</a></label>
                            </div>
                            <!-- Sign in Button Section  -->
                            <button type="submit" id="login_btn"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300">Sign
                                in</button>

                        </form>

                        <!-- Register Button Section..  -->

                        <div class="text-sm flex justify-between items-center mt-10">
                            <p>don't have an account...</p>
                            <button onclick="window.location.href='{{ route('register') }}'"
                                class="py-2 px-5 ml-3 bg-blue-700 border rounded-full hover:scale-110 duration-300 border-blue-400 text-white">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            $('#login_form').submit(function(e) {

                e.preventDefault();
                $("#login_btn").text("Please Wait......");
                $.ajax({
                    url: "{{ route('auth.login') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        // Redirect to a different page upon successful login
                        $('#login_form')[0].reset();
                        // Reset the button text
                        $("#login_btn").text("Submit");
                        window.location.href = "{{ route('feed') }}";
                    },
                    error: function(xhr, status, error) {
                        // Parse the error response JSON
                        var errors = JSON.parse(xhr.responseText).errors;
                        // Show error alerts
                        Object.keys(errors).forEach(function(key) {
                            showAlert('error', errors[key][0]);
                        });
                        $("#login_btn").text("Submit");

                    }
                });
            });

            function showAlert(type, message) {
                var alertClass = type === 'success' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700';
                var alertHtml = '<div class="p-2 mb-2 rounded-md ' + alertClass + '">' +
                    '<p class="text-sm">' + message + '</p>' +
                    '</div>';
                $('#loginalert').append(alertHtml);
                // Remove the alert after 5 seconds
                setTimeout(function() {
                    $('#loginalert').empty();
                }, 5000);
            }
        });
    </script>
@endpush
