<div class="mt-4 mx-8 pb-2">
    <h3 class="text-xl font-semibold mb-1">About Me</h3>
    <p class="text-md px-4">{{ $details['about'] != null ? $details['about'] : '-- --' }}</p>
</div>

<div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
    <h3 class="text-xl font-semibold mb-1">Personal Information</h3>
    <p class="text-md px-4"><span class="font-medium">Date of Birth:
        </span>{{ $details['dob'] != null ? $details['dob'] : '-- --' }}</p>
    <p class="text-md px-4"><span class="font-medium">Nickname:
        </span>{{ $details['nickname'] != null ? $details['nickname'] : '-- --' }}</p>
    <p class="text-md px-4"><span class="font-medium">Gender: </span>
        @if ($details['gender'] == 'M')
            {{ 'Male' }}
        @elseif ($details['gender'] == 'F')
            {{ 'Female' }}
        @elseif ($details['gender'] == 'O')
            {{ 'Other' }}
        @else
            {{ '-- --' }}
        @endif
    </p>
</div>

<div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
    <h3 class="text-xl font-semibold mb-1">Academics</h3>
    <p class="text-md px-4"><span class="font-medium">College name:
        </span>{{ $details['education'] != null ? $details['education'] : '-- --' }}</p>
    <p class="text-md px-4"><span class="font-medium">Graduation year:
        </span>{{ $details['graduation_year'] != null ? $details['graduation_year'] : '-- --' }}</p>
    <p class="text-md px-4"><span class="font-medium">Degree:
        </span>{{ $details['degree'] != null ? $details['degree'] : '-- --' }}</p>
    @if ($details['hostel'] != null)
        <p class="text-md px-4"><span class="font-medium">Hostel:
            </span>I stayed at '{{ $details['hostel'] }}' during my academics</p>
    @endif
</div>

@if ($details['career_history'] != null)
    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-1">Academic history</h3>
        @php
            $histories = explode(',', $details['career_history']);
        @endphp
        <ol class="relative border-s border-gray-600 mx-4 mt-3">
            @foreach ($histories as $history)
                <li class="mb-6 ms-4">
                    <div class="absolute w-3 h-3 bg-gray-500 rounded-full mt-1.5 -start-1.5 border border-white">
                    </div>
                    <time class="mb-1 text-xl font-medium leading-none text-gray-800">{{ $history }}</time>
                </li>
            @endforeach
        </ol>
    </div>
@endif

@if ($details['skills'] != null)
    <div class="mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-1">Skills</h3>
        @php
            $skills = explode(',', $details['skills']);
        @endphp
        <ul class="px-10">
            @foreach ($skills as $skill)
                <li class="list-disc">{{ ucfirst($skill) }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($details['expertise'] != null)
    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-1">Expertise</h3>
        @php
            $expertise = explode(',', $details['expertise']);
        @endphp
        <ul class="px-10">
            @foreach ($expertise as $exp)
                <li class="list-disc">{{ ucfirst($exp) }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($details['first_company'] && $details['current_company'])
    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-1">Career Journey</h3>

        <ol class="relative border-s border-gray-600 mx-4 mt-3">
            <li class="mb-6 ms-4">
                <div class="absolute w-3 h-3 bg-gray-500 rounded-full mt-1.5 -start-1.5 border border-white">
                </div>
                <time
                    class="mb-1 text-xl font-medium leading-none text-gray-800">{{ $details['first_company'] }}</time>
            </li>
            <li class="ms-4">
                <div class="absolute w-3 h-3 bg-gray-500 rounded-full mt-1.5 -start-1.5 border border-white">
                </div>
                <time
                    class="mb-1 text-xl font-medium leading-none text-gray-800">{{ $details['current_company'] }}</time>
            </li>
        </ol>
    </div>
@endif

@if ($details['projects'] != null)
    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-1">Projects</h3>
        @php
            $projects = explode(',', $details['projects']);
        @endphp
        <ul class="px-10">
            @foreach ($projects as $project)
                <li class="list-disc">{{ ucfirst($project) }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($details['publications'] != null)
    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-1">Publication</h3>
        @php
            $publications = explode(',', $details['publications']);
        @endphp
        <ul class="px-10">
            @foreach ($publications as $publication)
                <li class="list-disc">{{ ucfirst($publication) }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($details['languages'] != null)
    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-1">Languages</h3>
        @php
            $languages = explode(',', $details['languages']);
        @endphp
        <ul class="px-10">
            @foreach ($languages as $lang)
                <li class="list-disc">{{ ucfirst($lang) }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (
    $details['facebook_link'] ||
        $details['instagram_link'] ||
        $details['github_link'] ||
        $details['twitter_link'] ||
        $details['linkedin_link']
)

    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold">Social Links</h3>
        <div class="flex gap-3 items-center pt-2 px-4">
            @if ($details['facebook_link'] != null)
                <a href="{{ $details['facebook_link'] }}" target="_blank">
                    <svg viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8"
                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>Facebook-color</title>
                            <desc>Created with Sketch.</desc>
                            <defs> </defs>
                            <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0">
                                    <path
                                        d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z"
                                        id="Facebook"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            @endif

            @if ($details['instagram_link'] != null)
                <a href="{{ $details['instagram_link'] }}" target="_blank">
                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <rect x="2" y="2" width="28" height="28" rx="6"
                                fill="url(#paint0_radial_87_7153)">
                            </rect>
                            <rect x="2" y="2" width="28" height="28" rx="6"
                                fill="url(#paint1_radial_87_7153)">
                            </rect>
                            <rect x="2" y="2" width="28" height="28" rx="6"
                                fill="url(#paint2_radial_87_7153)">
                            </rect>
                            <path
                                d="M23 10.5C23 11.3284 22.3284 12 21.5 12C20.6716 12 20 11.3284 20 10.5C20 9.67157 20.6716 9 21.5 9C22.3284 9 23 9.67157 23 10.5Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21ZM16 19C17.6569 19 19 17.6569 19 16C19 14.3431 17.6569 13 16 13C14.3431 13 13 14.3431 13 16C13 17.6569 14.3431 19 16 19Z"
                                fill="white"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6 15.6C6 12.2397 6 10.5595 6.65396 9.27606C7.2292 8.14708 8.14708 7.2292 9.27606 6.65396C10.5595 6 12.2397 6 15.6 6H16.4C19.7603 6 21.4405 6 22.7239 6.65396C23.8529 7.2292 24.7708 8.14708 25.346 9.27606C26 10.5595 26 12.2397 26 15.6V16.4C26 19.7603 26 21.4405 25.346 22.7239C24.7708 23.8529 23.8529 24.7708 22.7239 25.346C21.4405 26 19.7603 26 16.4 26H15.6C12.2397 26 10.5595 26 9.27606 25.346C8.14708 24.7708 7.2292 23.8529 6.65396 22.7239C6 21.4405 6 19.7603 6 16.4V15.6ZM15.6 8H16.4C18.1132 8 19.2777 8.00156 20.1779 8.0751C21.0548 8.14674 21.5032 8.27659 21.816 8.43597C22.5686 8.81947 23.1805 9.43139 23.564 10.184C23.7234 10.4968 23.8533 10.9452 23.9249 11.8221C23.9984 12.7223 24 13.8868 24 15.6V16.4C24 18.1132 23.9984 19.2777 23.9249 20.1779C23.8533 21.0548 23.7234 21.5032 23.564 21.816C23.1805 22.5686 22.5686 23.1805 21.816 23.564C21.5032 23.7234 21.0548 23.8533 20.1779 23.9249C19.2777 23.9984 18.1132 24 16.4 24H15.6C13.8868 24 12.7223 23.9984 11.8221 23.9249C10.9452 23.8533 10.4968 23.7234 10.184 23.564C9.43139 23.1805 8.81947 22.5686 8.43597 21.816C8.27659 21.5032 8.14674 21.0548 8.0751 20.1779C8.00156 19.2777 8 18.1132 8 16.4V15.6C8 13.8868 8.00156 12.7223 8.0751 11.8221C8.14674 10.9452 8.27659 10.4968 8.43597 10.184C8.81947 9.43139 9.43139 8.81947 10.184 8.43597C10.4968 8.27659 10.9452 8.14674 11.8221 8.0751C12.7223 8.00156 13.8868 8 15.6 8Z"
                                fill="white"></path>
                            <defs>
                                <radialGradient id="paint0_radial_87_7153" cx="0" cy="0" r="1"
                                    gradientUnits="userSpaceOnUse"
                                    gradientTransform="translate(12 23) rotate(-55.3758) scale(25.5196)">
                                    <stop stop-color="#B13589"></stop>
                                    <stop offset="0.79309" stop-color="#C62F94"></stop>
                                    <stop offset="1" stop-color="#8A3AC8"></stop>
                                </radialGradient>
                                <radialGradient id="paint1_radial_87_7153" cx="0" cy="0" r="1"
                                    gradientUnits="userSpaceOnUse"
                                    gradientTransform="translate(11 31) rotate(-65.1363) scale(22.5942)">
                                    <stop stop-color="#E0E8B7"></stop>
                                    <stop offset="0.444662" stop-color="#FB8A2E"></stop>
                                    <stop offset="0.71474" stop-color="#E2425C"></stop>
                                    <stop offset="1" stop-color="#E2425C" stop-opacity="0"></stop>
                                </radialGradient>
                                <radialGradient id="paint2_radial_87_7153" cx="0" cy="0" r="1"
                                    gradientUnits="userSpaceOnUse"
                                    gradientTransform="translate(0.500002 3) rotate(-8.1301) scale(38.8909 8.31836)">
                                    <stop offset="0.156701" stop-color="#406ADC"></stop>
                                    <stop offset="0.467799" stop-color="#6A45BE"></stop>
                                    <stop offset="1" stop-color="#6A45BE" stop-opacity="0"></stop>
                                </radialGradient>
                            </defs>
                        </g>
                    </svg>
                </a>
            @endif

            @if ($details['github_link'] != null)
                <a href="{{ $details['github_link'] }}" target="_blank">
                    <svg viewBox="0 -0.5 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" class="w-8 h-8">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>Github-color</title>
                            <desc>Created with Sketch.</desc>
                            <defs> </defs>
                            <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Color-" transform="translate(-700.000000, -560.000000)" fill="#04162f">
                                    <path
                                        d="M723.9985,560 C710.746,560 700,570.787092 700,584.096644 C700,594.740671 706.876,603.77183 716.4145,606.958412 C717.6145,607.179786 718.0525,606.435849 718.0525,605.797328 C718.0525,605.225068 718.0315,603.710086 718.0195,601.699648 C711.343,603.155898 709.9345,598.469394 709.9345,598.469394 C708.844,595.686405 707.2705,594.94548 707.2705,594.94548 C705.091,593.450075 707.4355,593.480194 707.4355,593.480194 C709.843,593.650366 711.1105,595.963499 711.1105,595.963499 C713.2525,599.645538 716.728,598.58234 718.096,597.964902 C718.3135,596.407754 718.9345,595.346062 719.62,594.743683 C714.2905,594.135281 708.688,592.069123 708.688,582.836167 C708.688,580.205279 709.6225,578.054788 711.1585,576.369634 C710.911,575.759726 710.0875,573.311058 711.3925,569.993458 C711.3925,569.993458 713.4085,569.345902 717.9925,572.46321 C719.908,571.928599 721.96,571.662047 724.0015,571.651505 C726.04,571.662047 728.0935,571.928599 730.0105,572.46321 C734.5915,569.345902 736.603,569.993458 736.603,569.993458 C737.9125,573.311058 737.089,575.759726 736.8415,576.369634 C738.3805,578.054788 739.309,580.205279 739.309,582.836167 C739.309,592.091712 733.6975,594.129257 728.3515,594.725612 C729.2125,595.469549 729.9805,596.939353 729.9805,599.18773 C729.9805,602.408949 729.9505,605.006706 729.9505,605.797328 C729.9505,606.441873 730.3825,607.191834 731.6005,606.9554 C741.13,603.762794 748,594.737659 748,584.096644 C748,570.787092 737.254,560 723.9985,560"
                                        id="Github"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            @endif

            @if ($details['twitter_link'] != null)
                <a href="{{ $details['twitter_link'] }}" target="_blank">
                    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-9 h-9">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <circle cx="24" cy="24" r="20" fill="#1DA1F2"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M36 16.3086C35.1177 16.7006 34.1681 16.9646 33.1722 17.0838C34.1889 16.4742 34.9697 15.5095 35.3368 14.36C34.3865 14.9247 33.3314 15.3335 32.2107 15.5551C31.3123 14.5984 30.0316 14 28.6165 14C25.8975 14 23.6928 16.2047 23.6928 18.9237C23.6928 19.3092 23.7368 19.6852 23.8208 20.046C19.7283 19.8412 16.1005 17.8805 13.6719 14.9015C13.2479 15.6287 13.0055 16.4742 13.0055 17.3766C13.0055 19.0845 13.8735 20.5916 15.1958 21.4747C14.3878 21.4491 13.6295 21.2275 12.9647 20.8587V20.9203C12.9647 23.3066 14.663 25.296 16.9141 25.7496C16.5013 25.8616 16.0661 25.9224 15.6174 25.9224C15.2998 25.9224 14.991 25.8912 14.6902 25.8336C15.3166 27.7895 17.1357 29.2134 19.2899 29.2534C17.6052 30.5733 15.4822 31.3612 13.1751 31.3612C12.7767 31.3612 12.3848 31.338 12 31.2916C14.1791 32.6884 16.7669 33.5043 19.5475 33.5043C28.6037 33.5043 33.5562 26.0016 33.5562 19.4956C33.5562 19.282 33.5522 19.0693 33.5418 18.8589C34.5049 18.1629 35.34 17.2958 36 16.3086Z"
                                fill="white"></path>
                        </g>
                    </svg>
                </a>
            @endif

            @if ($details['linkedin_link'] != null)
                <a href="{{ $details['linkedin_link'] }}" target="_blank">
                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none" class="w-9 h-9">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill="#187adc"
                                d="M12.225 12.225h-1.778V9.44c0-.664-.012-1.519-.925-1.519-.926 0-1.068.724-1.068 1.47v2.834H6.676V6.498h1.707v.783h.024c.348-.594.996-.95 1.684-.925 1.802 0 2.135 1.185 2.135 2.728l-.001 3.14zM4.67 5.715a1.037 1.037 0 01-1.032-1.031c0-.566.466-1.032 1.032-1.032.566 0 1.031.466 1.032 1.032 0 .566-.466 1.032-1.032 1.032zm.889 6.51h-1.78V6.498h1.78v5.727zM13.11 2H2.885A.88.88 0 002 2.866v10.268a.88.88 0 00.885.866h10.226a.882.882 0 00.889-.866V2.865a.88.88 0 00-.889-.864z">
                            </path>
                        </g>
                    </svg>
                </a>
            @endif
        </div>
    </div>
@endif

@if ($details['resume'] != null)
    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-3">Resume</h3>
        <div class="relative w-max">
            <button type="button"
                class="rounded-xl overflow-hidden w-56 h-72 mx-4 focus:ring-2 focus:outline-none focus:ring-blue-800"
                data-modal-target="resume-modal" data-modal-toggle="resume-modal">
                <img src="{{ asset('/storage/' . $details['resume']) }}" alt="resume"
                    class="object-cover w-full h-full hover:opacity-90">
            </button>
            @if ($details['student_id'] == session()->get('user_id'))
                <button type="button"
                    data-delete-filename="{{ route('profile.deletefile', ['filename' => $details['resume']]) }}"
                    class="absolute -top-3 right-0 text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-900 p-1 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            @endif
        </div>
    </div>

    <!-- Resume Modal -->
    <div id="resume-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between px-4 py-2 border-b rounded-t">
                    <h3 class="text-xl font-medium text-gray-900">
                        Resume
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="resume-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <img src="{{ asset('/storage/' . $details['resume']) }}" alt="resume"
                        class="object-cover w-[30rem] h-[32rem] rounded-lg">
                </div>
            </div>
        </div>
    </div>
@endif

@if ($details['certificates'])
    @php
        $certificates = explode('||', $details['certificates']);
    @endphp

    <div class="mt-3 mx-8 py-2 border-t border-t-gray-400">
        <h3 class="text-xl font-semibold mb-3">Certificates</h3>
        <div class="grid grid-cols-4 gap-4 px-4">
            @foreach ($certificates as $index => $item)
                <div class="rounded-xl relative">
                    <button type="button"
                        class="w-full h-full rounded-xl focus:ring-2 focus:outline-none focus:ring-blue-800"
                        data-modal-target="certificate-modal-{{ $index }}"
                        data-modal-toggle="certificate-modal-{{ $index }}">
                        <img src="{{ asset('/storage/' . $item) }}" alt="certificate"
                            class="object-cover w-full h-full rounded-xl hover:opacity-95">
                    </button>
                    @if ($details['student_id'] == session()->get('user_id'))
                        <button type="button"
                            data-delete-filename="{{ route('profile.deletefile', ['filename' => $item]) }}"
                            class="absolute -top-3 -right-2 text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-900 p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    @foreach ($certificates as $index => $item)
        {{-- certificate modal --}}
        <div id="certificate-modal-{{ $index }}" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between px-4 py-2 border-b rounded-t">
                        <h3 class="text-xl font-medium text-gray-900">
                            Resume
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="certificate-modal-{{ $index }}">
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
                        <img src="{{ asset('/storage/' . $item) }}" alt="resume"
                            class="object-cover w-[56rem] h-[32rem] rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
