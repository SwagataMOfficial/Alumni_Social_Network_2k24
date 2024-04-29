@extends('layouts.main')
@push('title')
    <title>Home | Alumni Junction</title>
@endpush
@section('main-section')
    {{-- <div class="container bg-gray-200 min-h-[calc(100vh-67px)]"> --}}
    <div class="container">
        <div class="px-52 mx-auto py-3">
            <div class="bg-white max-h-[85vh] w-full flex flex-col items-center gap-2 py-4 rounded-xl overflow-auto">
                <h3 class="text-center font-semibold text-3xl">Notifications</h3>
                @if (count($notifications) == 0)
                    <h1 class="text-blue-600 font-semibold text-2xl mx-5 my-2">No new notifications</h1>
                @else
                    @foreach ($notifications as $i => $item)
                        @if ($item['read_at'] == null)
                            <a href="javascript:void(0);" data-link="{{ $item['url'] }}"
                                data-notify-id="{{ $item['notification_id'] }}"
                                class="w-full px-8 py-2 text-xl hover:bg-slate-200 flex justify-between items-center group">
                                <span class="font-semibold">{{ $item['n_description'] }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-6 h-6 group-hover:translate-x-2 transition-all ease-in duration-200">
                                    <path fill-rule="evenodd"
                                        d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <div
                                class="w-full px-8 py-2 text-xl flex justify-between items-center bg-gray-100 text-gray-500">
                                <span class="font-semibold">{{ $item['n_description'] }}</span>
                                <button class="hover:text-blue-700 " id="notify_delete_dropdown_{{ $i }}"
                                    data-dropdown-toggle="notify_delete_{{ $i }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            d="M10 3a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM10 8.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM11.5 15.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                    </svg>
                                </button>
                            </div>
                            <!-- Dropdown menu -->
                            <div id="notify_delete_{{ $i }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700"
                                    aria-labelledby="notify_delete_dropdown_{{ $i }}">
                                    <li>
                                        <a href="javascript:void(0);"
                                            data-delete-link="{{ route('notification.delete', ['id' => $item['notification_id']]) }}"
                                            class="block px-4 py-2 hover:bg-gray-100">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            // Attach click event handler to the anchor tag
            $('a[data-link]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();

                    // getting the url
                    const URL = $(element).attr("data-link");
                    const notifyID = $(element).attr("data-notify-id");

                    // AJAX call to set the notification as read
                    $.ajax({
                        url: "http://127.0.0.1:8000/notification/read/" + notifyID,
                        method: 'GET',
                        success: function(response) {
                            // Handle the AJAX response here
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }
                    });

                    // Perform AJAX request
                    $.ajax({
                        url: URL,
                        method: 'GET',
                        success: function(response) {
                            // Handle the AJAX response here
                            location.href = URL
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }
                    });
                });
            });

            // DELETE: deleting a notification

            $('a[data-delete-link]').each(function(index, element) {
                $(element).click(function(event) {
                    event.preventDefault();
                    const URL = $(element).attr("data-delete-link");

                    $.ajax({
                        url: URL,
                        method: 'GET',
                        success: function(response) {
                            // Handle the AJAX response here
                            Swal.fire({
                                icon: 'success',
                                title: 'Notification successfully deleted',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        });
    </script>
@endpush
