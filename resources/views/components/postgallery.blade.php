@if (count($details) != 0)
    <div class="mx-16 mt-4 gap-6 grid grid-cols-4">
        @foreach ($details as $index => $img)
            <button type="button" class="hover:opacity-90" data-modal-target="uploaded-image-modal-{{ $index }}"
                data-modal-toggle="uploaded-image-modal-{{ $index }}">
                <img class="w-auto aspect-square rounded-2xl object-cover" src="{{ asset('/storage/' . $img) }}"
                    alt="posted image">
            </button>

            {{-- posted image modal --}}
            <div id="uploaded-image-modal-{{ $index }}" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between px-4 py-2 border-b rounded-t">
                            <h3 class="text-xl font-medium text-gray-900">
                                Upload
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="uploaded-image-modal-{{ $index }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <img src="{{ asset('/storage/' . $img) }}" alt="uploaded image"
                                class="object-cover w-[56rem] h-[32rem] rounded-lg">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="rounded-lg overflow-hidden mx-auto my-4">
        <h1 class="text-center text-red-500 font-semibold text-3xl mt-6 mb-2">No Images Are Available</h1>
    </div>
@endif
