<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use Illuminate\Support\Str;


class UserController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        if (session()->has("loggedInUser")) {
            return redirect('/profile');
        }
        return view('register');
    }
    public function forgot()
    {
        if (session()->has("loggedInUser")) {
            return redirect('/profile');
        }
        return view('forgot');
    }
    public function reset_pass(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        return view('reset_pass', ['email' => $email, 'token' => $token]);
    }
    public function profile()
    {
        $userData = ['userInfo' => User::where('email', session('loggedInUser'))->first()];
        return view('layout.profile', $userData);
    }
    public function logout()
    {
        // Clear the user session
        Session::forget('loggedInUser');
        Session::forget('loggedin');
        Session::forget('token');
        Session::forget('user_id');
        Session::forget('user_name');

        // Redirect the user to the login page or any other page
        return redirect('/');

    }
    //handle register user ajax request
    public function saveUser(Request $request)
    {// Define custom error messages
        $customErrorMessages = [
            'u_fname.required' => 'Full Name is required.',
            'u_mail.required' => 'Email is required.',
            'u_mail.email' => 'Invalid email format.',
            'u_mail.unique' => 'Email is already registered.',
            'u_password.required' => 'Password is required.',
            'u_conpassword.required' => 'Confirm Password is required.',
            'u_conpassword.same' => 'Password confirmation does not match.',
            'dropdown1.required' => 'Graduation Year is required.',
            'dropdown2.required' => 'Degree is required.',
            'student_id.required' => 'Student ID is required.',
            'verify_doc.required' => 'Picture is required.',
            'verify_doc.image' => 'Uploaded file is not an image.',
            'verify_doc.mimes' => 'Only JPG, JPEG, PNG, and GIF files are allowed.',
            'verify_doc.max' => 'Maximum file size allowed is 2MB.',
        ];

        // Define validation rules
        $rules = [
            'u_fname' => 'required|string|max:255',
            'u_mail' => 'required|email|unique:users,email',
            'u_password' => 'required|string|min:6',
            'u_conpassword' => 'required|string|min:6|same:u_password',
            'dropdown1' => 'required', // Add validation rule for dropdown1
            'dropdown2' => 'required',
            'student_id' => 'required|string|max:255|unique:users,student_id',
            'verify_doc' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            // Add more validation rules as needed
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customErrorMessages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // Return validation errors with custom messages
        }
        // If validation passes, create the user
        $graduationYear = $request->input('dropdown1');
        $degree = $request->input('dropdown2');

        // generating filename with original file extension
        $filename = "verify_doc" . '.' . $request->file('verify_doc')->getClientOriginalExtension();

        // Store uploaded picture in the public/upload_student_id directory with the unique filename
        
        $user = User::create([
            'student_id' => $request->input('student_id'),
            'name' => $request->input('u_fname'),
            'email' => $request->input('u_mail'),
            'password' => bcrypt($request->input('u_password')),
            'graduation_year' => $graduationYear, // Assuming the field name is 'dropdown1'
            'degree' => $degree,
            'profile_picture' => "default/avatar.jpg",
            'cover_picture' => 'default/cover.png',
            'verification_document' => $filename,
            'remember_token' => md5($request->input('student_id') . $request->input('u_mail'))
        ]);
        $request->file('verify_doc')->storeAs($request->input('student_id') . '/verification_document', $filename, 'public');
        
        // Return success response
        return response()->json(['message' => 'User registered successfully'], 200);
    }



    public function loginUser(Request $request)
    {
        // Define validation rules
        $rules = [
            'identifier' => 'required',
            'password' => 'required',
        ];

        // Define custom error messages
        $customErrorMessages = [
            'identifier.required' => 'Email or Student ID is required.',
            'password.required' => 'Password is required.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customErrorMessages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Attempt to log in the user
        // Retrieve the user by email address or student ID from the database
        $user = User::where('email', $request->identifier)
            ->orWhere('student_id', $request->identifier)
            ->first();

        // Check if the user exists and the provided password matches
        if ($user && Hash::check($request->password, $user->password)) {
            session()->put("loggedInUser",$user->email); // You might want to change this
            session()->put("loggedin", true);
            session()->put("token", $user->remember_token);
            session()->put("user_id", $user->student_id);
            session()->put("user_name", $user->name);
            return response()->json(['message' => 'Login successful'], 200);
        } else {
            // Authentication failed
            return response()->json(['errors' => ['identifier' => ['Invalid email, student ID, or password.']]], 422);
        }
    }

    //forgot password ajax request
    public function forgotPassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the user with the provided email exists
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a token for password reset (you might have your own logic for this)
            $token = Str::random(60);

            // Set expiration time for the token (e.g., 10 minutes)
            $expiration = Carbon::now()->addMinutes(10)->toDateTimeString();

            // Save the token and expiration time in the database for the user
            $user->update([
                'remember_token' => $token,
                'token_expire' => $expiration,
            ], ['student_id' => $user->student_id]);



            $details = [
                'body' => route('Reset_Password', ['email' => $request->email, 'token' => $token])
            ];

            // Send the password reset email
            Mail::to($user->email)->send(new ForgotPassword($details));

            // Return a success response
            return response()->json(['message' => 'Password reset email sent successfully'], 200);
        } else {
            // If user with provided email does not exist, return an error response
            return response()->json(['error' => 'User not found'], 404);
        }
    }
    //reset/update password ajax request
    public function update_password(Request $request)
    {
        // Validate the request data
        $request->validate([
            're_password' => 'required|string|min:6',
            're_password_confirmation' => 'required|string|min:6|same:re_password',
            'token' => 'required', // You may need to pass the token through the form
        ], [
            're_password_confirmation.same' => 'The new password and confirm password must match.'
        ]);

        // Find the user by email and verify the token
        $user = User::where('email', $request->email)->where('token', $request->token)->first();

        if ($user) {
            // Update the user's password
            $user->update([
                'password' => Hash::make($request->re_password),
                'remember_token' => null, // Clear the token after password reset
                'token_expire' => null, // Clear the token expiration
            ]);

            // Redirect the user to a success page or login page
            return response()->json(['message' => 'Password reset  successfully! &nbsp;<h3><a href="/">Login Now</a></h3>'], 200);
        } else {
            // If the user or token is invalid, redirect back with an error message
            return response()->json(['error' => 'Link expired'],422);


        }
    }
}
