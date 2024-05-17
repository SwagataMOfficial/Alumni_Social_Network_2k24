@extends('layouts.main')
@push('title')
    <title>{{ $user['name'] }} - Edit | Alumni Junction</title>
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush
@section('main-section')
    {{-- max-width container with left,right space --}}
    <div class="px-4 sm:px-8 mx-auto py-3">
        <div class="flex flex-col items-center gap-3" id="section-container">

            {{-- floating area to show the user ID --}}
            <section class="bg-white w-full rounded-xl">
                <p
                    class="text-center text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                    <span class="font-semibold text-xl">Your ID: </span>{{ $user['student_id'] }}
                </p>
            </section>
            <section class="bg-white w-full rounded-xl">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Profile and Cover Image</h1>
                <form id="cover_and_profile_pic_edit_form" method="post" class="mx-6 sm:mx-12"
                    action="{{ route('profile.savechanges') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5 flex items-center justify-center gap-10">
                        <div class="flex items-center justify-center w-full h-24 sm:h-40 rounded-xl relative"
                            style="background: url('/storage/{{ $user['cover_picture'] }}') no-repeat center center/cover;">
                            <div class="relative w-20 sm:w-36 aspect-square">
                                <img src="/storage/{{ $user['profile_picture'] }}" alt="profile"
                                    class="w-full h-full rounded-[50%] border-[3px] border-white">
                                <input type="file" name="cover_picture" id="cover_picture" class="hidden"
                                    accept="image/jpeg,image/jpg,image/png,image/svg+xml">
                                <label for="profile_picture"
                                    class="bg-blue-600 p-2 sm:p-3 rounded-xl text-white cursor-pointer absolute bottom-0 right-0 hover:scale-95 hover:bg-blue-800 duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-4 sm:w-5 h-4 sm:h-5">
                                        <path fill-rule="evenodd"
                                            d="M1 8a2 2 0 0 1 2-2h.93a2 2 0 0 0 1.664-.89l.812-1.22A2 2 0 0 1 8.07 3h3.86a2 2 0 0 1 1.664.89l.812 1.22A2 2 0 0 0 16.07 6H17a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8Zm13.5 3a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM10 14a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </label>
                            </div>
                            <input type="file" name="profile_picture" id="profile_picture" class="hidden"
                                accept="image/jpeg,image/jpg,image/png,image/svg+xml">
                            <label for="cover_picture"
                                class="bg-blue-600 p-2 sm:p-3 rounded-xl text-white cursor-pointer absolute -bottom-4 -right-4 hover:scale-95 hover:bg-blue-800 duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 sm:w-5 h-4 sm:h-5">
                                    <path fill-rule="evenodd"
                                        d="M1 8a2 2 0 0 1 2-2h.93a2 2 0 0 0 1.664-.89l.812-1.22A2 2 0 0 1 8.07 3h3.86a2 2 0 0 1 1.664.89l.812 1.22A2 2 0 0 0 16.07 6H17a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8Zm13.5 3a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM10 14a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>
                    <button type="submit" id="edit_profile_img_btn"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                        value="Register">Save Changes</button>
                </form>
            </section>

            <section class="bg-white w-full rounded-xl">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Common Details</h1>
                <form id="edit_common_details_form" method="post" action="{{ route('profile.savechanges') }}">
                    @csrf
                    <div class="flex">
                        <div class="mb-2 max-sm:mx-4 sm:mx-10 w-full">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-500">Name</label>
                            <input type="text" name="name" id="name" style="scroll-margin-top: 11rem;"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                placeholder="Edit Your Name" value="{{ $user['name'] }}">
                        </div>
                        <div class="mb-2 max-sm:mx-4 max-sm:mr-8 sm:mx-10 w-full">
                            <label for="nickname" class="block mb-2 text-sm font-medium text-gray-500">Nickname</label>
                            <input type="text" name="nickname" id="nickname"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                value="{{ $user['nickname'] }}" placeholder="Edit Your Nickname">
                        </div>
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="about" class="block mb-2 text-sm font-medium text-gray-500">About me</label>
                        <textarea type="text" name="about" id="about"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Edit Your About">{{ $user['about'] }}</textarea>
                    </div>

                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="dob" class="block mb-2 text-sm font-medium text-gray-500">Date of
                            Birth</label>
                        <input type="date" name="dob" id="dob"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            value="{{ $user['dob'] }}">
                    </div>
                    <div class="mb-2 mx-10">
                        <p class="block mb-2 text-sm font-medium text-gray-500">Gender</p>
                        <div class="flex gap-4 mx-3">
                            <div class="flex items-center">
                                <input class="w-4 h-4 border-gray-300 cursor-pointer" type="radio" name="gender"
                                    id="male" value="M" {{ $user['gender'] == 'M' ? 'checked' : '' }}>
                                <label class="ms-2 text-sm font-medium text-gray-700 cursor-pointer"
                                    for="male">Male</label>
                            </div>
                            <div class="flex items-center">
                                <input class="w-4 h-4 border-gray-300 cursor-pointer" type="radio" name="gender"
                                    id="female" value="F" {{ $user['gender'] == 'F' ? 'checked' : '' }}>
                                <label class="ms-2 text-sm font-medium text-gray-700 cursor-pointer"
                                    for="female">Female</label>
                            </div>
                            <div class="flex items-center">
                                <input class="w-4 h-4 border-gray-300 cursor-pointer" type="radio" name="gender"
                                    id="others" value="O" {{ $user['gender'] == 'O' ? 'checked' : '' }}>
                                <label class="ms-2 text-sm font-medium text-gray-700 cursor-pointer"
                                    for="others">Others</label>
                            </div>
                        </div>
                    </div>
                    <div class="mx-12 mt-3">
                        <button type="submit" id="common_details_btn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                            value="Register">Save Changes</button>
                    </div>
                </form>
            </section>

            <section class="bg-white w-full rounded-xl">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Contact Details</h1>
                <form id="edit_contact_details_form" method="post" action="{{ route('profile.savechanges') }}">
                    @csrf
                    <div class="flex">
                        <div class="mb-2 max-sm:mx-4 sm:mx-10 w-full">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-500">Phone</label>
                            <input type="number" name="phone" id="phone" style="scroll-margin-top: 11rem;"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                placeholder="Edit Your Phone Number" value="{{ $user['phone'] }}">
                        </div>
                        <div class="mb-2 max-sm:mx-4 max-sm:mr-8 sm:mx-10 w-full">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-500">Email</label>
                            <input type="email" name="email" id="email"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                placeholder="Edit Your Email" value="{{ $user['email'] }}" readonly>
                        </div>
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-500">Address</label>
                        <textarea name="address" id="address" rows="3"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Edit Your Address">{{ $user['address'] }}</textarea>
                    </div>
                    <div class="mx-12 mt-3">
                        <button type="submit" id="contact_details_btn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                            value="Register">Save Changes</button>
                    </div>
                </form>
            </section>

            <section class="bg-white w-full rounded-xl">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Education Details</h1>
                <form id="edit_education_details_form" method="post" action="{{ route('profile.savechanges') }}">
                    @csrf
                    <div class="flex">
                        <div class="mb-2 max-sm:mx-4 sm:mx-10 w-full">
                            <label for="graduation_year" class="block mb-2 text-sm font-medium text-gray-500">Edit
                                Graduation
                                Year</label>
                            <select name="graduation_year" id="graduation_year" style="scroll-margin-top: 11rem;"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                required>
                                <option value="" disabled selected>Choose Year</option>
                                <option value="2020" {{ $user['graduation_year'] == '2020' ? 'selected' : '' }}>2020
                                </option>
                                <option value="2021" {{ $user['graduation_year'] == '2021' ? 'selected' : '' }}>2021
                                </option>
                                <option value="2022" {{ $user['graduation_year'] == '2022' ? 'selected' : '' }}>2022
                                </option>
                                <option value="2023" {{ $user['graduation_year'] == '2023' ? 'selected' : '' }}>2023
                                </option>
                                <option value="2024" {{ $user['graduation_year'] == '2024' ? 'selected' : '' }}>2024
                                </option>
                            </select>
                        </div>
                        <div class="mb-2 max-sm:mx-4 max-sm:mr-8 sm:mx-10 w-full">
                            <label for="degree" class="block mb-2 text-sm font-medium text-gray-500">Edit
                                Degree</label>
                            <select name="degree" id="degree"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                required>
                                <option value="" disabled selected>Choose Degree</option>
                                <option value="BCA" {{ $user['degree'] == 'BCA' ? 'selected' : '' }}>BCA</option>
                                <option value="BBA" {{ $user['degree'] == 'BBA' ? 'selected' : '' }}>BBA</option>
                                <option value="MCA" {{ $user['degree'] == 'MCA' ? 'selected' : '' }}>MCA</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="education" class="block mb-2 text-sm font-medium text-gray-500">Education</label>
                        <input type="text" name="education" id="education"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Edit School" value="{{ $user['education'] }}">
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="languages" class="block mb-2 text-sm font-medium text-gray-500">Languages</label>
                        <input type="text" name="languages" id="languages"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Ex: language-1, language-2, language-3, language-4, ...."
                            value="{{ $user['languages'] }}">
                    </div>
                    <div class="mx-12 mt-3">
                        <button type="submit" id="education_details_btn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                            value="Register">Save Changes</button>
                    </div>
                </form>
            </section>

            <section class="bg-white w-full rounded-xl">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Skills</h1>
                <form id="Edit_skills_form" method="post" action="{{ route('profile.savechanges') }}">
                    @csrf
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="skills" class="block mb-2 text-sm font-medium text-gray-500">Skills</label>
                        <input type="text" name="skills" id="skills" style="scroll-margin-top: 11rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Ex: skills-1, skills-2, skills-3, skills-4, ..." value="{{ $user['skills'] }}">
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="expertise" class="block mb-2 text-sm font-medium text-gray-500">Expertise</label>
                        <input type="text" name="expertise" id="expertise"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Ex: expertise-1, expertise-2, expertise-3, expertise-4, ..."
                            value="{{ $user['expertise'] }}">
                    </div>
                    <div class="mx-12 mt-3">
                        <button type="submit" id="edit_skills_btn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                            value="Register">Save Changes</button>
                    </div>
                </form>
            </section>

            <section class="bg-white w-full rounded-xl">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Your Career</h1>
                <form id="edit_your_career_form" method="post" action="{{ route('profile.savechanges') }}">
                    @csrf
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="career_history" class="block mb-2 text-sm font-medium text-gray-500">Your Career
                            History</label>
                        <input type="text" name="career_history" id="career_history" style="scroll-margin-top: 11rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Ex: story 1, story 2, ...." value="{{ $user['career_history'] }}">
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="projects" class="block mb-2 text-sm font-medium text-gray-500">Your
                            Projects</label>
                        <input type="text" name="projects" id="projects"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Ex: project-1, project-2, project-3, project-4, ..."
                            value="{{ $user['projects'] }}">
                    </div>
                    <div class="flex">
                        <div class="mb-2 max-sm:mx-4 sm:mx-10 w-full">
                            <label for="first_company" class="block mb-2 text-sm font-medium text-gray-500">Your First
                                Company</label>
                            <input type="text" name="first_company" id="first_company" style="scroll-margin-top: 20rem;"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                placeholder="Edit your first company" value="{{ $user['first_company'] }}">
                        </div>
                        <div class="mb-2 max-sm:mx-4 max-sm:mr-8 sm:mx-10 w-full">
                            <label for="current_company" class="block mb-2 text-sm font-medium text-gray-500">Your
                                Current Company</label>
                            <input type="text" name="current_company" id="current_company"
                                class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                                placeholder="Edit your current company" value="{{ $user['current_company'] }}">
                        </div>
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="publications" class="block mb-2 text-sm font-medium text-gray-500">Your
                            Publications</label>
                        <input type="text" name="publications" id="publications" style="scroll-margin-top: 25rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Ex: publication-1, publication-2, publication-3, publication-4, ..."
                            value="{{ $user['publications'] }}">
                    </div>
                    <div class="mb-2 ml-4 max-sm:mr-8 sm:mx-10">
                        <label for="hostel" class="block mb-2 text-sm font-medium text-gray-500">Hostel</label>
                        <input type="text" name="hostel" id="hostel"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Enter your hostel name (if any)" value="{{ $user['hostel'] }}">
                    </div>
                    <div class="mx-12 mt-3">
                        <button type="submit" id="career_btn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                            value="Register">Save Changes</button>
                    </div>
                </form>
            </section>

            <section class="bg-white w-full rounded-xl">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Links</h1>
                <form id="edit_links_form" method="post" action="{{ route('profile.savechanges') }}">
                    @csrf
                    <div class="mb-2 max-sm:ml-10 max-sm:mr-2 sm:mx-10 flex items-center gap-1">
                        <label for="facebook_link" class="block text-sm font-medium text-gray-500">
                            <svg viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8"
                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>Facebook-color</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs> </defs>
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0">
                                            <path
                                                d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z"
                                                id="Facebook"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </label>
                        <input type="text" name="facebook_link" id="facebook_link" style="scroll-margin-top: 9rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Facebook link" value="{{ $user['facebook_link'] }}">
                    </div>
                    <div class="mb-2 max-sm:ml-10 max-sm:mr-2 sm:mx-10 flex items-center gap-1">
                        <label for="instagram_link" class="block text-sm font-medium text-gray-500">
                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect x="2" y="2" width="28" height="28" rx="6"
                                        fill="url(#paint0_radial_87_7153)"></rect>
                                    <rect x="2" y="2" width="28" height="28" rx="6"
                                        fill="url(#paint1_radial_87_7153)"></rect>
                                    <rect x="2" y="2" width="28" height="28" rx="6"
                                        fill="url(#paint2_radial_87_7153)"></rect>
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
                        </label>
                        <input type="text" name="instagram_link" id="instagram_link" style="scroll-margin-top: 12rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Instagram link"value="{{ $user['instagram_link'] }}">
                    </div>
                    <div class="mb-2 max-sm:ml-10 max-sm:mr-2 sm:mx-10 flex items-center gap-1">
                        <label for="github_link" class="block text-sm font-medium text-gray-500">
                            <svg viewBox="0 -0.5 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" class="w-8 h-8">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>Github-color</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs> </defs>
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="Color-" transform="translate(-700.000000, -560.000000)" fill="#04162f">
                                            <path
                                                d="M723.9985,560 C710.746,560 700,570.787092 700,584.096644 C700,594.740671 706.876,603.77183 716.4145,606.958412 C717.6145,607.179786 718.0525,606.435849 718.0525,605.797328 C718.0525,605.225068 718.0315,603.710086 718.0195,601.699648 C711.343,603.155898 709.9345,598.469394 709.9345,598.469394 C708.844,595.686405 707.2705,594.94548 707.2705,594.94548 C705.091,593.450075 707.4355,593.480194 707.4355,593.480194 C709.843,593.650366 711.1105,595.963499 711.1105,595.963499 C713.2525,599.645538 716.728,598.58234 718.096,597.964902 C718.3135,596.407754 718.9345,595.346062 719.62,594.743683 C714.2905,594.135281 708.688,592.069123 708.688,582.836167 C708.688,580.205279 709.6225,578.054788 711.1585,576.369634 C710.911,575.759726 710.0875,573.311058 711.3925,569.993458 C711.3925,569.993458 713.4085,569.345902 717.9925,572.46321 C719.908,571.928599 721.96,571.662047 724.0015,571.651505 C726.04,571.662047 728.0935,571.928599 730.0105,572.46321 C734.5915,569.345902 736.603,569.993458 736.603,569.993458 C737.9125,573.311058 737.089,575.759726 736.8415,576.369634 C738.3805,578.054788 739.309,580.205279 739.309,582.836167 C739.309,592.091712 733.6975,594.129257 728.3515,594.725612 C729.2125,595.469549 729.9805,596.939353 729.9805,599.18773 C729.9805,602.408949 729.9505,605.006706 729.9505,605.797328 C729.9505,606.441873 730.3825,607.191834 731.6005,606.9554 C741.13,603.762794 748,594.737659 748,584.096644 C748,570.787092 737.254,560 723.9985,560"
                                                id="Github"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </label>
                        <input type="text" name="github_link" id="github_link" style="scroll-margin-top: 15rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Github link"value="{{ $user['github_link'] }}">
                    </div>
                    <div class="mb-2 max-sm:ml-10 max-sm:mr-2 sm:mx-10 flex items-center gap-1">
                        <label for="twitter_link" class="block text-sm font-medium text-gray-500">
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
                        </label>
                        <input type="text" name="twitter_link" id="twitter_link" style="scroll-margin-top: 18rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Twitter link"value="{{ $user['twitter_link'] }}">
                    </div>
                    <div class="mb-2 max-sm:ml-10 max-sm:mr-2 sm:mx-10 flex items-center gap-1">
                        <label for="linkedin_link" class="block text-sm font-medium text-gray-500">
                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none" class="w-9 h-9">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill="#187adc"
                                        d="M12.225 12.225h-1.778V9.44c0-.664-.012-1.519-.925-1.519-.926 0-1.068.724-1.068 1.47v2.834H6.676V6.498h1.707v.783h.024c.348-.594.996-.95 1.684-.925 1.802 0 2.135 1.185 2.135 2.728l-.001 3.14zM4.67 5.715a1.037 1.037 0 01-1.032-1.031c0-.566.466-1.032 1.032-1.032.566 0 1.031.466 1.032 1.032 0 .566-.466 1.032-1.032 1.032zm.889 6.51h-1.78V6.498h1.78v5.727zM13.11 2H2.885A.88.88 0 002 2.866v10.268a.88.88 0 00.885.866h10.226a.882.882 0 00.889-.866V2.865a.88.88 0 00-.889-.864z">
                                    </path>
                                </g>
                            </svg>
                        </label>
                        <input type="text" name="linkedin_link" id="linkedin_link" style="scroll-margin-top: 21rem;"
                            class="border border-gray-600 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-3"
                            placeholder="Linkedin link"value="{{ $user['linkedin_link'] }}">
                    </div>
                    <div class="mx-12 mt-3">
                        <button type="submit" id="links_btn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                            value="Register">Save Changes</button>
                    </div>
                </form>
            </section>
            {{-- edit documents --}}
            <section class="bg-white w-full rounded-xl" id="documents_upload_section">
                <h1 class="text-stone-600 font-bold text-xl mx-5 my-2">Edit Documents</h1>
                <form id="edit_documents_form" method="post" enctype="multipart/form-data"
                    action="{{ route('profile.savechanges') }}">
                    @csrf
                    <div class="flex items-center flex-col sm:flex-row sm:justify-evenly md:px-32">
                        @if (!$user['verified_at'])
                            <div class="px-4 py-2 w-full">
                                <h3 class="font-semibold text-sm text-center">Upload Verification Document</h3>
                                <div class="w-full flex flex-col items-center justify-center h-1/2 my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-12 h-12 fill-blue-600">
                                        <path
                                            d="M9.25 13.25a.75.75 0 0 0 1.5 0V4.636l2.955 3.129a.75.75 0 0 0 1.09-1.03l-4.25-4.5a.75.75 0 0 0-1.09 0l-4.25 4.5a.75.75 0 1 0 1.09 1.03L9.25 4.636v8.614Z" />
                                        <path
                                            d="M3.5 12.75a.75.75 0 0 0-1.5 0v2.5A2.75 2.75 0 0 0 4.75 18h10.5A2.75 2.75 0 0 0 18 15.25v-2.5a.75.75 0 0 0-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5Z" />
                                    </svg>
                                    <p class="font-semibold" id="verification_file_show"></p>
                                </div>
                                <div class="w-full flex items-center justify-center h-1/2">
                                    <label for="verification_document"
                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-6 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3 cursor-pointer">
                                        Browse
                                    </label>
                                    <input type="file" name="verification_document" id="verification_document"
                                        class="hidden" accept="image/jpeg,image/jpg,image/png,image/svg+xml">
                                </div>
                            </div>
                        @endif

                        <div class="px-4 py-2 w-full">
                            <h3 class="font-semibold text-sm text-center">Upload Your Resume</h3>
                            <div class="w-full flex flex-col items-center justify-center h-1/2 my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-12 h-12 fill-blue-600">
                                    <path
                                        d="M9.25 13.25a.75.75 0 0 0 1.5 0V4.636l2.955 3.129a.75.75 0 0 0 1.09-1.03l-4.25-4.5a.75.75 0 0 0-1.09 0l-4.25 4.5a.75.75 0 1 0 1.09 1.03L9.25 4.636v8.614Z" />
                                    <path
                                        d="M3.5 12.75a.75.75 0 0 0-1.5 0v2.5A2.75 2.75 0 0 0 4.75 18h10.5A2.75 2.75 0 0 0 18 15.25v-2.5a.75.75 0 0 0-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5Z" />
                                </svg>
                                <p class="font-semibold" id="resume_file_show"></p>
                            </div>
                            <div class="w-full flex items-center justify-center h-1/2">
                                <label for="resume"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-6 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3 cursor-pointer">
                                    Browse
                                </label>
                                <input type="file" name="resume" id="resume" class="hidden"
                                    accept="image/jpeg,image/jpg,image/png,image/svg+xml">
                            </div>
                        </div>

                        <div class="px-4 py-2 w-full">
                            <h3 class="font-semibold text-sm text-center">Upload Your Certificates</h3>
                            <div class="w-full flex flex-col items-center justify-center h-1/2 my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-12 h-12 fill-blue-600">
                                    <path
                                        d="M9.25 13.25a.75.75 0 0 0 1.5 0V4.636l2.955 3.129a.75.75 0 0 0 1.09-1.03l-4.25-4.5a.75.75 0 0 0-1.09 0l-4.25 4.5a.75.75 0 1 0 1.09 1.03L9.25 4.636v8.614Z" />
                                    <path
                                        d="M3.5 12.75a.75.75 0 0 0-1.5 0v2.5A2.75 2.75 0 0 0 4.75 18h10.5A2.75 2.75 0 0 0 18 15.25v-2.5a.75.75 0 0 0-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5Z" />
                                </svg>
                                <p class="font-semibold" id="certificate_file_show"></p>
                            </div>
                            <div class="w-full flex items-center justify-center h-1/2">
                                <label for="certificates"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-6 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3 cursor-pointer">
                                    Browse
                                </label>
                                <input type="file" name="certificates[]" id="certificates" class="hidden" multiple
                                    accept="image/jpeg,image/jpg,image/png,image/svg+xml">
                            </div>
                        </div>
                    </div>
                    <div class="mx-12 mt-3">
                        <button type="submit" id="edit_documents_btn"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-1/7 xxl:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-95 duration-300 mb-3"
                            value="Register">Save Changes</button>
                    </div>
                </form>
            </section>
            {{-- edit document section end --}}
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            // tracking if files are selected for upload or not [if uploaded then show the uploaded file names into the label area]
            $('#resume').change(function() {
                if (this.files && this.files.length > 0) {
                    let filenames = [];
                    for (var i = 0; i < this.files.length; i++) {
                        filenames.push(this.files[i].name);
                    }
                    var files = filenames.join(', ');
                    // slicing the string if the length is bigger than 50
                    if (files.length > 34) {
                        files = files.slice(0, 30) + "....";
                    }
                    // adding the result into the dropbox area to show that the files are selected properly
                    $('#resume_file_show').text("Selected files: " + files);
                }
            });

            @if (!$user['verified_at'])
                $('#verification_document').change(function() {
                    if (this.files && this.files.length > 0) {
                        let filenames = [];
                        for (var i = 0; i < this.files.length; i++) {
                            filenames.push(this.files[i].name);
                        }
                        var files = filenames.join(', ');
                        // slicing the string if the length is bigger than 50
                        if (files.length > 34) {
                            files = files.slice(0, 30) + "....";
                        }
                        // adding the result into the dropbox area to show that the files are selected properly
                        $('#verification_file_show').text("Selected files: " + files);
                    }
                });
            @endif

            $('#certificates').change(function() {
                if (this.files && this.files.length > 0) {
                    let filenames = [];
                    for (var i = 0; i < this.files.length; i++) {
                        filenames.push(this.files[i].name);
                    }
                    var files = filenames.join(', ');
                    // slicing the string if the length is bigger than 50
                    if (files.length > 34) {
                        files = files.slice(0, 30) + "....";
                    }
                    // adding the result into the dropbox area to show that the files are selected properly
                    $('#certificate_file_show').text("Selected files: " + files);
                }
            });

            // Add event listener to the form submit event
            $('#cover_and_profile_pic_edit_form').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Change button text to "Submitting..."
                $('#edit_profile_img_btn').text('Submitting...');
                // Create FormData object to send form data asynchronously
                var formData = new FormData(this);

                // Store the form object to use inside AJAX success callback
                var form = $(this);

                // Perform AJAX request
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting the content type
                    success: function(response) {
                        // If the response is successful, show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Image Updated Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Update page content dynamically
                        // For example, you can reload the page or update specific elements with new data
                        // For simplicity, let's reload the page after 1.5 seconds (same as the timer for success message)
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    },
                    error: function(xhr, status, error) {
                        // If there's an error, show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to update image',
                            text: 'Please try again later',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    complete: function() {
                        // Reset button text after AJAX request is complete
                        $('#edit_profile_img_btn').text('Save Changes');
                    }
                });
            });


            $('#edit_common_details_form').submit(function(event) {
                event.preventDefault();

                var formData = new FormData(this);
                $('#common_details_btn').text('Submitting...');
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Common Details Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#common_details_btn').text('Save Changes');
                            // Update text boxes with new data
                            $('#name').val(response.user.name);
                            $('#nickname').val(response.user.nickname);
                            $('#about').val(response.user.about);
                            $('#dob').val(response.user.dob);

                            // Update gender radio button
                            $('input[name="gender"][value="' + response.user.gender + '"]')
                                .prop('checked', true);

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to update common details',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to update common details',
                            text: 'Please try again later',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
            });

            $('#edit_contact_details_form').submit(function(event) {
                event.preventDefault();
                $('#contact_details_btn').text('Submitting........');
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Contact Details Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#contact_details_btn').text('Save Changes');
                            // Update text boxes with new data
                            $('#phone').val(response.user.phone);
                            $('#email').val(response.user.email);
                            $('#address').val(response.user.address);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to update contact details',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        let errors = JSON.parse(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: errors.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    complete: function() {
                        // Reset button text after AJAX request is complete
                        $('#contact_details_btn').text('Save Changes');
                    }
                });
            });

            $('#edit_education_details_form').submit(function(event) {
                event.preventDefault();
                $('#education_details_btn').text('Submitting...');
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Education Details Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#education_details_btn').text('Save Changes');

                            // // Update select and input fields with new data
                            var graduationYear = response.user.graduation_year;
                            var degree = response.user.degree;

                            // // Update graduation year select
                            $('#graduation_year option').each(function() {
                                if ($(this).val() === graduationYear) {
                                    $(this).prop('selected', true);
                                } else {
                                    $(this).prop('selected', false);
                                }
                            });

                            // // Update degree select
                            $('#degree option').each(function() {
                                if ($(this).val() === degree) {
                                    $(this).prop('selected', true);
                                } else {
                                    $(this).prop('selected', false);
                                }
                            });

                            // Update education input
                            $('#education').val(response.user.education);
                            // Update languages input
                            $('#languages').val(response.user.languages);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to update education details',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to update education details',
                            text: 'Please try again later',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    complete: function() {
                        // Reset button text after AJAX request is complete

                    }
                });
            });


            $('#Edit_skills_form').submit(function(event) {
                event.preventDefault();
                $('#edit_skills_btn').text('Submitting...');
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Skills Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#edit_skills_btn').text('Save Changes');
                            // Update skills and expertise fields with new data
                            $('#skills').val(response.user.skills);
                            $('#expertise').val(response.user.expertise);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to update skills',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to update skills',
                            text: 'Please try again later',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    complete: function() {
                        // Reset button text after AJAX request is complete

                    }
                });
            });

            $('#edit_your_career_form').submit(function(event) {
                event.preventDefault();
                $('#career_btn').text('Submitting...');
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Career Details Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#career_btn').text('Save Changes');
                            // Update career details fields with new data
                            $('#career_history').val(response.user.career_history);
                            $('#projects').val(response.user.projects);
                            $('#first_company').val(response.user.first_company);
                            $('#current_company').val(response.user.current_company);
                            $('#publications').val(response.user.publications);
                            $('#hostel').val(response.user.hostel);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to update career details',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to update career details',
                            text: 'Please try again later',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    complete: function() {
                        // Reset button text after AJAX request is complete

                    }
                });
            });


            $('#edit_links_form').submit(function(event) {
                event.preventDefault();
                $('#links_btn').text('Submitting...');
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Links Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#links_btn').text('Save Changes');
                            // Update link fields with new data
                            $('#facebook_link').val(response.user.facebook_link);
                            $('#instagram_link').val(response.user.instagram_link);
                            $('#github_link').val(response.user.github_link);
                            $('#twitter_link').val(response.user.twitter_link);
                            $('#linkedin_link').val(response.user.linkedin_link);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to update links',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to update links',
                            text: 'Please try again later',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    complete: function() {
                        // Reset button text after AJAX request is complete

                    }
                });
            });

            $('#edit_documents_form').submit(function(e) {
                e.preventDefault(); // Prevent form submission
                $('#edit_documents_btn').text('Submitting...');
                var formData = new FormData($(this)[0]); // Get form data

                $.ajax({
                    url: $(this).attr('action'), // Form action URL
                    type: 'POST',
                    data: formData, // Form data
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Changes saved successfully!',
                        }).then(function() {
                            location.reload();
                        });
                        $('#edit_documents_btn').text('Save Changes');
                    },
                    error: function(xhr, status, error) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'An error occurred while saving changes.',
                        });
                    }
                });
            });
        });
    </script>
@endpush
