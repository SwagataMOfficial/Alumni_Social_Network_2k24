@extends('layouts.main')

@push('title')
    <title>Register | Alumni Junction</title>
@endpush

@section('main-section')
    <!-- Body Background Image  -->

    <div class="max-h-screen"
        style="background-image: url('{{ asset('images/reg_background_img.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    backdrop-filter: blur(1px);">
        <section class="min-h-screen flex items-center justify-center">
            <div id="signUpFormContainer">
                <!-- Brand logo  -->
                <img src="{{ asset('images/reg_brand_logo.png') }}" alt="Logo"
                    class="absolute top-0 left-0  h-16 mt-3 ml-3" />
                <!-- row  -->
                <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
                    <!-- Left portion  -->
                    <div class="md:w-1/2 px-5">
                        {{-- alert msg --}}
                        <div id="alertContainer"></div>
                        <!-- Form  -->
                        <form class="max-w-sm mx-auto" action="" method="post" id="register_form">
                            @csrf
                            <!-- First Name Section  -->
                            <div class="mb-5">
                                <label for="FullName" class="block mb-2 text-sm font-medium text-gray-500">Full Name</label>
                                <input name="u_fname" type="text" id="fname"
                                    class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <!-- E-mail Section  -->
                            <div class="mb-5">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-500">E-mail</label>
                                <div class="flex">
                                    <input name="u_mail" type="email" id="mail"
                                        class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="name@gmail.com" required />
                                    <button type="button" id="sendOTPBtn"
                                        class="ml-3 px-4 py-2 bg-blue-500 text-white rounded">Send OTP</button>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="otp" class="block mb-2 text-sm font-medium text-gray-500">OTP</label>
                                <div class="flex">
                                    <input name="otp" type="text" id="otp"
                                        class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Enter OTP" required />
                                    <button type="button" id="verifyOTPBtn" style="display: none;"
                                        class="ml-3 px-4 py-2 bg-blue-500 text-white rounded">Verify OTP</button>
                                </div>
                            </div>
                            <!-- Password Section and Confirm Password Section  -->
                            <div class="grid grid-cols-2 gap-5">
                                <div class="mb-5">
                                    <label for="Password"
                                        class="block mb-2 text-sm font-medium text-gray-500">Password</label>
                                    <input name="u_password" type="password" id="u_password"
                                        class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5">
                                    <label for="Password" class="block mb-2 text-sm font-medium text-gray-500">Confirm
                                        Password</label>
                                    <input name="u_conpassword" type="password" id="u_conpassword"
                                        class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>
                            {{-- dropdown --}}
                            <div class="grid grid-cols-2 gap-5 mb-5">
                                <div>
                                    <label for="dropdown1" class="block mb-2 text-sm font-medium text-gray-500">Graduation
                                        Year</label>
                                    <select name="dropdown1" id="dropdown1"
                                        class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                        <option value="" disabled selected>Choose Year</option>
                                        <option value="2020">2010</option>
                                        <option value="2021">2011</option>
                                        <option value="2022">2012</option>
                                        <option value="2023">2013</option>
                                        <option value="2024">2014</option>
                                        <option value="2020">2015</option>
                                        <option value="2021">2016</option>
                                        <option value="2022">2017</option>
                                        <option value="2023">2018</option>
                                        <option value="2024">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="dropdown2"
                                        class="block mb-2 text-sm font-medium text-gray-500">Degree</label>
                                    <select name="dropdown2" id="dropdown2"
                                        class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                        <option value="" disabled selected>Choose Degree</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BBA">BBA</option>
                                        <option value="MCA">MCA</option>
                                    </select>
                                </div>
                            </div>

                            <!-- student id -->
                            <div class="mb-5">
                                <label for="student_id" class="block mb-2 text-sm font-medium text-gray-500">Student
                                    ID</label>
                                <input name="student_id" type="text" id="student_id"
                                    class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <!-- File input option  -->
                            <div class="mb-5 flex items-center">
                                <label for="verify_doc" class="mr-3 text-sm font-medium text-gray-500">Upload Student
                                    ID</label>
                                <input type="file" name="verify_doc" id="verify_doc"
                                    class="border border-gray-600 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block"
                                    required>
                            </div>


                            <!-- Registration Button Section  -->
                            <button type="submit" id="reg_btn"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300"
                                value="Register">Register</button>

                            <!-- Already have an account? Section -->
                            <div class="text-center mt-3 mb-1">
                                <p class="text-gray-500 text-sm">Already have an account? <a href="/"
                                        class="text-blue-500 hover:underline">Sign in</a></p>
                            </div>


                        </form>

                    </div>

                    <div class="w-1/2 md:block hidden ">
                        <img src="{{ asset('images/reg_man_img.png') }}" alt="" class="mt-12">
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            // Variable to track OTP validation status
            var otpValidated = false;
            // Send OTP
            $('#sendOTPBtn').click(function() {
                var email = $('#mail').val();
                if (email.trim() === '') {
                    showAlert('error', 'Please enter your email.');
                    return; // Stop execution if email field is empty
                }
                $(this).prop('disabled', true).text('Sending...');
                var csrf_token = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token
                $.ajax({
                    url: "{{ route('send.otp') }}", // Replace with your route
                    method: "POST",
                    data: {
                        email: email,
                        _token: csrf_token
                    },
                    success: function(response) {
                        showAlert('success', 'OTP sent to your email.');
                        $('#mail').prop('readonly', true);
                        $('#sendOTPBtn').prop('disabled', false).text('Send OTP');
                        $('#sendOTPBtn').hide(); // Hide the Send OTP button
                        $('#verifyOTPBtn').show(); // Show the Verify OTP button
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON.error;
                        showAlert('error',
                        errorMessage); // Assuming showAlert is a function to display alerts
                        $('#sendOTPBtn').prop('disabled', false).text('Send OTP');
                    }
                });
            });

            // Verify OTP
            $('#verifyOTPBtn').click(function() {
                var otp = $('#otp').val();
                if (otp.trim() === '') {
                    showAlert('error', 'Please enter the OTP.');
                    return; // Stop execution if OTP field is empty
                }
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('verify.otp') }}", // Replace with your route
                    method: "POST",
                    data: {
                        otp: otp,
                        _token: csrf_token
                    },
                    success: function(response) {
                        showAlert('success', 'OTP verified successfully.');
                        $('#sendOTPBtn, #verifyOTPBtn')
                    .hide(); // Hide both Send OTP and Verify OTP buttons
                        otpValidated = true;
                        $('#otp').prop('readonly', true);
                        // Enable registration form here
                    },
                    error: function(xhr, status, error) {
                        showAlert('error', 'Invalid OTP. Please try again.');
                        $('#sendOTPBtn').show(); 
                        $('#verifyOTPBtn').hide();// Show the Send OTP button again
                    }
                });
            });

            // Registration form submission
            $('#register_form').submit(function(e) {
                // Prevent default form submission
                e.preventDefault();
                // Check if OTP is validated
                if (otpValidated) {
                    // Proceed with form submission
                    $("#reg_btn").text("Please Wait......");
                    var formData = new FormData(this);
                    $.ajax({
                        url: "{{ route('auth.register') }}", // Replace 'auth.register' with your actual route name
                        method: "POST",
                        data: formData,
                        contentType: false, // Prevent jQuery from automatically setting the Content-Type header
                        processData: false,
                        success: function(response) {
                            showAlert('success', 'User registered successfully');
                            // Reset the form
                            $('#register_form')[0].reset();
                            // Reset the button text
                            $("#reg_btn").text("Register");
                            setTimeout(() => {
                                window.location.href = "{{ url('/') }}";
                            }, 2000);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Parse the error response JSON
                            var errors = JSON.parse(xhr.responseText).errors;
                            // Show error alerts
                            Object.keys(errors).forEach(function(key) {
                                showAlert('error', errors[key][0]);
                            });
                            // Reset the button text
                            $("#reg_btn").text("Register");
                        }
                    });
                } else {
                    // Show an error message indicating that OTP validation is required
                    showAlert('error', 'Please verify OTP before submitting the form.');
                }
            });

            function showAlert(type, message) {
                var alertClass = type === 'success' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700';
                var alertHtml = '<div class="p-2 mb-2 rounded-md ' + alertClass + '">' +
                    '<p class="text-sm">' + message + '</p>' +
                    '</div>';
                $('#alertContainer').append(alertHtml);
                // Remove the alert after 5 seconds
                setTimeout(function() {
                    $('#alertContainer').empty();
                }, 5000);
            }
        });
    </script>
@endpush
