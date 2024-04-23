@extends('layouts.main')

@push('title')
    <title>Forgot Password | Alumni Junction</title>
@endpush

@section('main-section')
    <section class="min-h-screen flex items-center justify-center"
        style="background-image: url('{{ asset('images/reg_background_img.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    backdrop-filter: blur(1px);">
        <div id="forgotFormContainer" class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
            <div class="w-1/2 md:block hidden ">
                <img src="{{ asset('images/forget_pass_g.png') }}" alt="" class="mt-12">
            </div>
            <div class="md:w-1/2 px-5">
                <h1 class="text-3xl font-semibold mb-8 text-gray-800">Forgot Your Password?</h1>
                <p class="text-gray-600 mb-5">Enter your email address below and we'll send you a link to reset your
                    password.</p>
                <div id="alertContainer"></div>
                <form class="max-w-sm mx-auto" action="" method="POST" id="forgot_form">
                    @csrf <!-- CSRF token -->
                    <div class="mb-10">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-500">Email</label>
                        <input name="email" type="email" id="email"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="name@gmail.com" required />
                    </div>
                    <button type="submit" id="forgot_pass_btn"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300">Reset
                        Password</button>
                </form>
            </div>

        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#forgot_pass_btn').click(function(e) {
                e.preventDefault();
                var email = $('#email').val();
                $("#forgot_pass_btn").text("Please Wait......");
                $.ajax({
                    type: "POST",
                    url: "{{ route('auth.forgot') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "email": email
                    },
                    success: function(response) {
                        showAlert('success', response.message);
                        // Reset the form
                        $('#forgot_form')[0].reset();
                        $("#forgot_pass_btn").text("Reset Password");
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        var errorMessage = JSON.parse(xhr.responseText).error;
                        showAlert('error', errorMessage);
                        // Reset the button text
                        $("#forgot_pass_btn").text("Reset Password");
                    }
                });

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
