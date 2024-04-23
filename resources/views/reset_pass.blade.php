@extends('layouts.main')

@push('title')
    <title>Reset Password | Alumni Junction</title>
@endpush

@section('main-section')
    <section class="min-h-screen flex items-center justify-center" style="background-image: url('{{ asset('images/login_background_img.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; backdrop-filter: blur(1px);">
        <div id="resetFormContainer" class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
            <div class=" px-5">
                <h1 class="text-3xl font-semibold mb-8 text-gray-800">Reset Your Password</h1>
                <div id="alertContainer"></div>
                <form class="max-w-sm mx-auto" action="" method="POST" id="reset_form">
                    @csrf <!-- CSRF token -->
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="mb-5">
                        <label for="re_email" class="block mb-2 text-sm font-medium text-gray-500">Email</label>
                        <input name="re_email" type="email" id="re_email" value="{{ $email }}"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled />
                    </div>
                    <div class="mb-5">
                        <label for="re_password" class="block mb-2 text-sm font-medium text-gray-500">New Password</label>
                        <input name="re_password" type="password" id="re_password"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="re_password_confirmation" class="block mb-2 text-sm font-medium text-gray-500">Confirm
                            New Password</label>
                        <input name="re_password_confirmation" type="password" id="re_password_confirmation"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                    <button type="submit" id="reset_pass_btn"
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
            $('#reset_pass_btn').click(function(e) {
                e.preventDefault();
                var formData = $('#reset_form').serialize();
                $("#reset_pass_btn").text("Please Wait......");
                $.ajax({
                    type: "POST",
                    url: "{{ route('auth.reset') }}", // Adjust the route to your controller method
                    data: formData,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        showAlert('success', response.message);
                        $("#reset_pass_btn").text("Reset Password");
                        $('#reset_form')[0].reset();
                        // Optionally redirect the user or show a success message
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);

                        var response = JSON.parse(xhr.responseText);
                        if (response.error) {
                            showAlert('error', response.error);
                        } else if (response.errors) {
                            // Show each validation error separately
                            Object.keys(response.errors).forEach(function(field) {
                                response.errors[field].forEach(function(errorMessage) {
                                    showAlert('error', errorMessage);
                                });
                            });
                        } else {
                            showAlert('error', 'An unexpected error occurred.');
                        }

                        $("#reset_pass_btn").text("Reset Password");

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
