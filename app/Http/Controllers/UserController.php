<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendOTPMail;

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
    {
        $customErrorMessages = [
            'u_fname.required' => 'Full Name is required.',
            'u_mail.required' => 'Email is required.',
            'u_mail.email' => 'Invalid email format.',
            'u_mail.unique' => 'Email is already registered.',
            'u_password.required' => 'Password is required.',
            'u_password.min' => 'User password must be at least six characters long.',
            'u_conpassword.min' => 'User Confirm password must be at least six characters long.',
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
            'student_id' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Custom validation logic to check if user with the same student ID exists
                    $existingUser = User::where('student_id', $value)->first();
                    if ($existingUser) {
                        if ($existingUser->deleted_acc == 1) {
                            $fail('User account is banned.');
                        } else {
                            $fail('Student ID is taken.');
                        }
                    }
                }
            ],
            'verify_doc' => 'required|image|mimes:jpeg,png,jpg|max:2048'
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
        $filename = $request->input('student_id') . "/verification_document/verify_doc" . '.' . $request->file('verify_doc')->getClientOriginalExtension();

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
        $request->file('verify_doc')->storeAs('/', $filename, 'public');
        //  $request->file('verification_document')->storeAs('/', $filename, 'public');

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

        // Check if the user exists
        if ($user) {
            // Check if the user is banned
            if ($user->deleted_acc == 1) {
                // User is banned, show alert
                return response()->json(['errors' => ['identifier' => ['This user is banned from the platform.']]], 422);
            }

            // Check if the provided password matches
            if (Hash::check($request->password, $user->password)) {
                // Password matches, log in the user
                session()->put("loggedInUser", $user->email);
                session()->put("loggedin", true);
                session()->put("token", $user->remember_token);
                session()->put("user_id", $user->student_id);
                session()->put("user_name", $user->name);
                session()->put("user_profile_img", $user->profile_picture);
                return response()->json(['message' => 'Login successful'], 200);
            } else {
                // Password does not match, authentication failed
                return response()->json(['errors' => ['identifier' => ['Invalid email, student ID, or password.']]], 422);
            }
        } else {
            // User does not exist, authentication failed
            return response()->json(['errors' => ['identifier' => ['Invalid email, student ID, or password.']]], 422);
        }
    }

    //forgot password ajax request
    public function forgotPassword(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email',
    ], [
        'email.required' => 'A valid email is required.',
        'email.email' => 'A valid email is required.',
    ]);

    // Check if the user with the provided email exists
    $user = User::where('email', $request->email)->first();

    if ($user) {
        if ($user->deleted_acc == 1) {
            // Return a specific error message if the user is banned
            return response()->json(['error' => 'This user is banned from the platform and cannot receive a password reset link.'], 422);
        }

        // Generate a token for password reset (you might have your own logic for this)
        $token = Str::random(60);

        // Set expiration time for the token (e.g., 10 minutes)
        $expiration = Carbon::now()->addMinutes(10)->toDateTimeString();

        // Save the token and expiration time in the database for the user
        $user->update([
            'forget_token' => $token,
            'forget_token_expire' => $expiration,
        ]);

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
            'token' => 'required',
        ], [
            're_password.required' => 'The password field must be filled.',
            're_password.min' => 'The password must be at least :min characters long.',
            're_password_confirmation.required' => 'The confirmation password field must be filled.',
            're_password_confirmation.min' => 'The confirmation password must be at least :min characters long.',
            're_password_confirmation.same' => 'The new password and confirm password must match.'
        ]);

        // Find the user by email and verify the token
        $user = User::where('email', $request->email)->where('forget_token', $request->token)->first();

        if ($user) {
            // Update the user's password
            $user->update([
                'password' => Hash::make($request->re_password),
                'forget_token' => null, // Clear the token after password reset
                'forget_token_expire' => null, // Clear the token expiration
            ]);

            // Redirect the user to a success page or login page
            return response()->json(['message' => 'Password reset  successfully! &nbsp;<h3><a href="/">Login Now</a></h3>'], 200);
        } else {
            // If the user or token is invalid, redirect back with an error message
            return response()->json(['error' => 'Link expired'], 422);


        }
    }

    public function delete_account(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6',
            'delete_acc_id' => 'required'
        ], [
            'password.required' => 'Please enter the correct password!',
            'delete_acc_id.required' => 'Please enter the password.',
            'password.min' => 'Password must be at least :min characters long.'
        ]);

        // Retrieve the user based on the email stored in the session
        $user = User::with('getFriends')->where("student_id", '=', $request->delete_acc_id)->first();

        foreach ($user->toArray()['get_friends'] as $key => $value) {

            // pending requests don't need to decrease the count of friend
            if ($value['is_pending'] != 1) {
                $friend = User::find($value['friend_id']);

                // user friend count can't be less than 0
                if ($friend->friends > 0) {
                    $friend->friends -= 1;
                }
                $friend->save();
            }
        }

        // Check if the user exists
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }

        // Check if the provided current password matches the user's password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Password is incorrect!'], 422);
        }

        $folderPath = 'public/' . $request->delete_acc_id;

        // Check if the folder exists before attempting to delete
        if (Storage::exists($folderPath)) {
            try {
                // Attempt to delete the directory and all its contents recursively
                Storage::deleteDirectory($folderPath);
                $res = $user->delete();
                if ($res) {
                    return response()->json(['success' => true, 'message' => 'Account deleted successfully!'], 200);
                }
            } catch (\Exception $e) {
                // Handle other exceptions that may occur during deletion
                return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
            }
        } else {
            return response()->json(['success' => false, 'message' => "An error occured!"], 422);
        }
    }





    // Generate and send OTP
    public function sendOTP(Request $request)
    {
        // Retrieve the email from the request
        $email = $request->input('email');
    
        // Check if the email is already registered
        $existingUser = User::where('email', $email)->first();
    
        if ($existingUser) {
            if ($existingUser->deleted_acc == 1) {
                // Return a specific error message if the user is banned
                return response()->json(['error' => 'User is banned from the platform.'], 422);
            } else {
                // Return an error message if the email is already registered
                return response()->json(['error' => 'Email is already registered.'], 422);
            }
        }
    
        // Generate a random OTP
        $otp = mt_rand(100000, 999999);
    
        // Store the OTP in session
        $request->session()->put('otp', $otp);
    
        // Send the OTP via email
        Mail::to($email)->send(new SendOTPMail($otp));
    
        // Return a success response
        return response()->json(['message' => 'OTP sent successfully'], 200);
    }

    // Validate OTP
    public function verifyOTP(Request $request)
    {
        // Get the OTP from the request
        $otp = $request->input('otp');

        // Get the stored OTP from session
        $storedOtp = $request->session()->pull('otp');

        // Compare the OTPs
        if ($otp == $storedOtp) {
            // OTP is valid
            return response()->json(['message' => 'OTP validated successfully'], 200);
        } else {
            // Invalid OTP
            return response()->json(['error' => 'Invalid OTP'], 400);
        }
    }
}



