<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Support;
use App\Models\Userpost;
use App\Mail\SupportReply;
use App\Mail\AccountBanned;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\AccountVerifiedMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use App\Mail\VerificationDocumentRejectedMail;

use Symfony\Component\HttpKernel\Event\RequestEvent;

class AdminController extends Controller
{
    //___________________________views________________________
    public function admin_login()
    {
        return view('admin_auth.supadmin');
    }
    public function sub_admin_login()
    {
        return view('admin_auth.subadmin');
    }
    public function logout()
    {
        // Clear the user session
        Session::forget('Super_admin_logged_in');

        // Redirect the user to the login page or any other page
        return redirect('/admin');

    }
    //user management START---
    public function usermanagement()
    {
        $users = User::where('ban_acc', 0)->whereNotNull('verified_at')->get();

        $data = compact('users');


        return view('super_admin.Usermanagement')->with($data);
    }
    public function usermanagementview($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return redirect('/admin/usermanagement')->with('error', 'User not found.');
        }

        // Retrieve user's posts (excluding deleted posts)
        $userPosts = Userpost::where('posted_by', $id)->where('delete_post', '!=', 1)->get();

        if ($userPosts->isEmpty()) {
            return redirect()->back()->with('message', 'No posts found for this user.');
        }

        // Extract image paths from user posts
        $imagePathsArray = [];
        foreach ($userPosts as $post) {
            $attachments = explode("||", $post->attachment);
            foreach ($attachments as $attachment) {
                // Assuming each attachment is a file path
                $imagePathsArray[] = $attachment;
            }
        }

        return view('super_admin.usermanagement_view')->with(compact('user', 'imagePathsArray', 'userPosts'));
    }


    public function usermanagementview_delete($id)
    {
        // Find the post by ID
        $post = Userpost::find($id);

        if ($post) {
            // Set the delete_post column to 1
            $post->delete_post = 1;
            $post->save();
            // Create a notification for the user
            Notification::create([
                'notified_to' => $post->posted_by,
                'n_description' => 'Your post has been deleted by the admin. Please refrain from posting similar content in the future, as repeated violations may result in account suspension or banning.',
                'type' => 'post-deleted',
                'url' => route('notifications'), // Adjust the URL as needed
                'created_at' => now(),
                'updated_at' => now()
            ]);
            // Count the remaining posts for the user
            $remainingPostsCount = Userpost::where('posted_by', $post->posted_by)
                ->where('delete_post', '!=', 1)
                ->count();

            // If there are no remaining posts for the user, redirect to the profileview page
            if ($remainingPostsCount === 0) {
                return redirect('/admin/usermanagement')->with('success', 'Post deleted successfully.');
            }

            // Redirect back to the profileview page
            return redirect()->back()->with('success', 'Post deleted successfully.');
        } else {
            // If post not found, redirect back with 
            return redirect()->back();
        }
    }

    public function usermanagementview_suspend($id)
    {
        $post = Userpost::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        // Set the delete_post column to 1
        $post->delete_post = 1;
        $post->save();

        // Suspend the user by setting ban_acc to 1
        $user = User::find($post->posted_by);
        if ($user) {
            $user->ban_acc = 1;

            $user->save();
            Notification::create([
                'notified_to' => $post->posted_by,
                'n_description' => 'Your account has been banned. It is currently under review by the super admin. Additionally, one of your posts has been deleted by the admin. Please contact support for further assistance ',
                'type' => 'suspend_ac',
                'url' => route('notifications'), // Adjust the URL as needed
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect('/admin/usermanagement')->with('success', 'User successfully suspended .');
    }
    //user management END---

    //Team START---
    public function admin_team()
    {
        // Fetch all sub-admins
        $subAdmins = Admin::where('admin_type', 'sub')->get();

        // Decrypt passwords for each sub-admin
        foreach ($subAdmins as $subAdmin) {
            $subAdmin->decryptedPassword = Crypt::decryptString($subAdmin->password);
        }

        return view('super_admin.team', compact('subAdmins'));
    }

    public function teamadd()
    {
        //$data=new Admin();
        //$value=compact('data');
        return view('super_admin.teamadd');//->with($value);
    }

    public function teamMemberadd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            // Encrypt the password before saving
            $encryptedPassword = Crypt::encryptString($request->input('password'));

            // Insert data into admin table
            $team = new Admin;
            $team->name = $request->input('name');
            $team->email = $request->input('email');
            $team->password = $encryptedPassword;

            $team->save();

            return redirect('/admin/admin_team')->with('success', 'Successfully Registered');
        } catch (QueryException $e) {
            // If save fails due to a duplicate entry
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('email_error', 'Email already exists.');
            } else {
                // Handle other types of database errors
                // You might want to log the error for further investigation
                return redirect()->back()->with('error', 'An error occurred. Please try again.');
            }
        }
    }

    public function admin_team_remove($id)
    {

        $sub_admin = Admin::find($id);

        if ($sub_admin) {

            $sub_admin->delete();
            return redirect()->back()->with('success', 'Record is removed');
        } else {
            return redirect()->back()->with('error', 'Record not Found!!!');
        }
    }
    public function admin_team_changePassword($id)
    {

        $sub_admin = Admin::find($id);

        if (!$sub_admin) {
            return redirect()->back()->with('error', 'Member is not Found');
        } else {

            return view('super_admin.team_changePassword', compact('id'));
        }
    }


    public function admin_team_updatePassword(Request $request, $id)
    {
        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|confirmed',
            'new-password_confirmation' => 'required'
        ]);

        $member = Admin::find($id);

        if (!$member) {
            return back()->with('error', 'User not found.');
        }

        // Decrypt the stored password
        $storedEncryptedPassword = $member->password;
        $storedPassword = Crypt::decryptString($storedEncryptedPassword);

        // Check if the current password matches the stored password
        if ($request->input('current-password') !== $storedPassword) {
            return back()->with('error', 'Current password is incorrect.');
        }

        // Encrypt the new password
        $newEncryptedPassword = Crypt::encryptString($request->input('new-password'));

        // Update the password
        $member->password = $newEncryptedPassword;
        $member->save();

        return redirect('/admin/admin_team')->with('success', 'Password updated successfully.');
    }


    //Team END!!!

    public function content()
    {
        return view('super_admin.Contentmoderation');
    }
    public function viewcontent()
    {
        return view('super_admin.viewcontent');
    }

    //ban user SRART---
    public function userban()
    {
        $banuser = User::where('ban_acc', '1')->where('deleted_acc', '0')->get();
        $data = compact('banuser');
        return view('super_admin.banneduser')->with($data);
    }

    public function userban_unban($id)
    {

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update the user's ban_acc column to 0 (unban)
        $user->ban_acc = 0;
        $user->save();

        // Update reported posts associated with the user
        //UserPost::where('posted_by', $id)->update(['reported_at' => null]);  --- update the column

        // UserPost::where('posted_by', $id)
        // ->whereNotNull('reported_at')    --- delete the reported post
        // ->delete();

        // Update delete_post column to 0 for the user's posts  
        // UserPost::where('posted_by', $id)->update(['delete_post' => 0]);
        Notification::create([
            'notified_to' => $user->student_id,
            'n_description' => 'Good news! Your account has been reviewed by the admin and has been unbanned. You can now access your account as usual. We apologize for any inconvenience caused during this time.
            ',
            'type' => 'unban-ac',
            'url' => route('notifications'), // Adjust the URL as needed
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        return redirect()->back()->with('success', 'User unbanned successfully.');
    }

   

    public function userban_delete($id)
    {
        $user = User::find($id);

        // Delete all friends of that user
        $friends = Friend::where('student_id','=', $user->student_id)->where('is_pending','=', '0')->get();
        
        if(!$friends){
            return redirect()->back()->with('error', 'Failed to delete the user.');
        }

        // Decrementing friend count of each friend of the user
        foreach ($friends as $value) {
            $value->getFriend->friends -= 1;
            $value->getFriend->save();
        }

        $friends = Friend::where('student_id','=', $user->student_id)->orWhere('friend_id','=', $user->student_id)->delete();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Delete the folder where the user's posts' images are stored
        $folderPath = storage_path('app/public/' . $user->student_id);
        if (File::exists($folderPath)) {
            File::deleteDirectory($folderPath);
        }

        // Delete all records associated with the user from the user_posts table
        Userpost::where('posted_by', $id)->delete();

        // Delete all friends of that user

        // Ban the user's account
        $user->deleted_acc = 1;
        $user->friends = 0;
        $user->save();
        Session::forget('loggedInUser');
        Session::forget('loggedin');
        Session::forget('token');
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('user_profile_img');

        // Send ban notification email
        Mail::to($user->email)->send(new AccountBanned($user));

        return redirect()->back()->with('success', 'User Deleted');
    }

    public function userban_view($id)
    {

        $user = User::find($id);

        if (is_null($user)) {
            return redirect()->back();
        } else {
            $userPosts = Userpost::where('posted_by', $id)
                ->where('delete_post', 1)
                ->get();

            return view('super_admin.banneduser_view', compact('userPosts', 'user'));
        }
    }
    //ban user END---

    //user support START
    public function support()
    {
        // Retrieve users who have at least one query and whose reply is null
        $users = Support::select('supports.student_id', 'users.name', 'users.email')
            ->join('users', 'supports.student_id', '=', 'users.student_id')
            ->whereNotNull('supports.query')
            ->whereNull('supports.reply')
            ->where('ban_acc', '=', '0')
            ->distinct()
            ->get();

        return view('super_admin.support', compact('users'));

    }

    public function viewsupport($id)
    {
        // Retrieve user's queries with null replies
        $queries = Support::where('student_id', $id)
            ->whereNotNull('query')
            ->whereNull('reply')
            ->get();

        return view('super_admin.viewsupport', compact('queries'));

    }
    // public function viewsupport_submit(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'id' => 'required|exists:supports,id', // Ensure the query ID exists in the supports table
    //         'reply' => 'required|string|max:255', // Validate the reply
    //     ]);

    //     // Find the support record by query ID
    //     $support = Support::find($validatedData['id']);

    //     if ($support) {

    //         $support->reply = $validatedData['reply'];
    //         $support->save();

    //         return redirect()->back()->with('success', 'Reply submitted successfully.');
    //     } else {
    //         // Redirect back with an error message if the support record is not found
    //         return redirect()->back()->with('error', 'Support record not found.');
    //     }
    // }
    public function viewsupport_submit(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:supports,id',
            'reply' => 'required|string|max:255',
        ]);

        // Find the support record by query ID
        $support = Support::find($validatedData['id']);

        if ($support) {
            // Retrieve the query text from the support record
            $query = $support->query;

            $support->reply = $validatedData['reply'];
            $support->save();

            // Retrieve the user associated with the support
            $user = User::find($support->student_id);

            if ($user) {
                $email = $user->email;

                // Send email to the user with query and reply
                Mail::to($email)->send(new SupportReply($query, $validatedData['reply']));
                Notification::create([
                    'notified_to' => $support->student_id,
                    'n_description' => 'We wanted to inform you that a response has been provided to your recent query by our support team. Please check your email inbox for the detailed reply. ',
                    'type' => 'support_reply',
                    'url' => route('notifications'), // Adjust the URL as needed
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                // Delete the support record
                $support->delete();

                return redirect()->back()->with('success', 'Reply submitted successfully. An email has been sent.');
            } else {
                return redirect()->back()->with('error', 'User not found for the associated support.');
            }
        } else {
            return redirect()->back()->with('error', 'Support record not found.');
        }
    }
    //user support END!!!

    // super_CHANGE PASSWORD START---
    public function changepassword()
    {
        return view('super_admin.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|different:current-password|confirmed',
            'new-password_confirmation' => 'required',
        ]);

        // Retrieve the user's email from the session
        $userEmail = session()->get('Super_admin_logged_in');

        // Retrieve the user based on the email stored in the session
        $user = Admin::where('email', $userEmail)->first();

        // Check if the user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Check if the provided current password matches the user's password
        if (!Hash::check($request->input('current-password'), $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update the user's password
        $user->password = Hash::make($request->input('new-password'));
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');

    }
    //CHANGE PASSWORD END!!

    //super dashboard START---
    public function super_admin_dashboard()
    {
        $userData = ['userInfo' => DB::table('admins')->where('email', session('Super_admin_logged_in'))->first()];
        //last 5 recent join user data
        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        //count the total user from user table
        $totalUser = User::where('ban_acc', 0)->whereNotNull('verified_at')->count();

        //count the total posts from user_posts table
        $totalPost = Userpost::count();

        //count the total sub admin from admin table
        $totalSubAdmin = Admin::where('admin_type', 'sub')->count();

        // Get the count of total pending query in support table
        $totalPendingQuery = Support::whereNull('reply')->count();

        $data = compact('totalUser', 'totalPost', 'totalSubAdmin', 'userData', 'recentUsers', 'totalPendingQuery');
        return view('super_admin.Sup_admin_dashboard')->with($data);
    }


    //_super admin login request ajax__________________
    public function loginUser(Request $request)
    {

        $email = $request->input('super_admin_email');
        $password = $request->input('super_admin_password');

        $user = DB::table('admins')->where('email', $email)->where('admin_type', 'super')->first();
        if ($user !== null) {
            // Use password_verify to compare hashed password
            if (Hash::check($password, $user->password)) {
                // Authentication passed
                session(['Super_admin_logged_in' => $user->email]);
                return response()->json(['message' => 'Login successful'], 200);
            } else {
                return response()->json(['errors' => ['identifier' => ['Invalid email or password.']]], 422);
            }
        }
        return response()->json(['errors' => ['identifier' => ['Invalid email or password.']]], 422);
    }
    //sub admin login request ajaxx
    public function subloginUser(Request $request)
    {
        $email = $request->input('sub_admin_email');
        $password = $request->input('sub_admin_password');

        $user = DB::table('admins')->where('email', $email)->where('admin_type', 'sub')->first();

        // Check if user exists before accessing its properties
        if ($user !== null) {
            // Decrypt the stored password
            $storedEncryptedPassword = $user->password;
            $storedPassword = Crypt::decryptString($storedEncryptedPassword);

            if ($storedPassword === $password) {
                // Authentication passed
                session(['sub_admin_logged_in' => $user->email]);
                session(['sub_admin_name' => $user->name]);
                return response()->json(['message' => 'Login successful'], 200);
            }
        }

        // Authentication failed (either user doesn't exist or incorrect password)
        return response()->json(['errors' => ['identifier' => ['Invalid email or password.']]], 422);
    }

    // Sub Admin methods


    //user Management start---
    public function subadmin_usermanagement()
    {
        // $users = User::where('ban_acc', 0)->get();
        $users = User::where('ban_acc', 0)
        ->whereNotNull('verified_at')
        ->get();

        $data = compact('users');
        return view('sub_admin.Sub_usermanagement')->with($data);
    }
    public function subadmin_profileview($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return redirect('/subadmin/usermanagement')->with('error', 'User not found.');
        }

        // Retrieve user's posts (excluding deleted posts)
        $userPosts = Userpost::where('posted_by', $id)->where('delete_post', '!=', 1)->get();

        if ($userPosts->isEmpty()) {
            return redirect()->back()->with('message', 'No posts found for this user.');
        }

        // Extract image paths from user posts
        $imagePathsArray = [];
        foreach ($userPosts as $post) {
            $attachments = explode("||", $post->attachment);
            foreach ($attachments as $attachment) {
                // Assuming each attachment is a file path
                $imagePathsArray[] = $attachment;
            }
        }

        return view('sub_admin.Sub_profile_view')->with(compact('user', 'imagePathsArray', 'userPosts'));
    }

    public function subadmin_profileview_delete($id)
    {
        // Find the post by ID
        $post = Userpost::find($id);

        if ($post) {
            // Set the delete_post column to 1
            $post->delete_post = 1;
            $post->save();

            // Count the remaining posts for the user
            $remainingPostsCount = Userpost::where('posted_by', $post->posted_by)
                ->where('delete_post', '!=', 1)
                ->count();
                Notification::create([
                    'notified_to' => $post->posted_by,
                    'n_description' => 'Your post has been deleted by the admin. Please refrain from posting similar content in the future, as repeated violations may result in account suspension or banning',
                    'type' => 'post-deleted',
                    'url' => route('notifications'), // Adjust the URL as needed
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            // If there are no remaining posts for the user, redirect to the profileview page
            if ($remainingPostsCount === 0) {
                return redirect('/subadmin/usermanagement')->with('success', 'Post deleted successfully.');
            }

            // Redirect back to the profileview page
            return redirect()->back()->with('success', 'Post deleted successfully.');
        } else {
            // If post not found, redirect back with 
            return redirect()->back();
        }
    }


    public function subadmin_profileview_suspend($id)
    {
        $post = Userpost::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        // Set the delete_post column to 1
        $post->delete_post = 1;
        $post->save();

        // Suspend the user by setting ban_acc to 1
        $user = User::find($post->posted_by);
        if ($user) {
            $user->ban_acc = 1;
            $user->save();
            Notification::create([
                'notified_to' => $post->posted_by,
                'n_description' => 'Your account has been banned. It is currently under review by the super admin. Additionally, one of your posts has been deleted by the admin. Please contact support for further assistance ',
                'type' => 'suspend_ac',
                'url' => route('notifications'), // Adjust the URL as needed
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect('/subadmin/usermanagement')->with('success', 'User successfully suspended .');
    }
    //user Management END!!!


    // Reported Content START--
    public function subadmin_reportedContent()
    {
        // Retrieve distinct posted_by values for users who have at least one reported post
        $userIdsWithReports = DB::table('user_posts')
            ->join('users', 'user_posts.posted_by', '=', 'users.student_id')
            ->select('user_posts.posted_by')
            ->whereNotNull('user_posts.reported_at')
            ->where('user_posts.delete_post', 0)
            ->where('users.ban_acc', 0)
            ->distinct()
            ->pluck('user_posts.posted_by');


        // Retrieve user details for the users with reported posts
        $usersWithReports = User::whereIn('student_id', $userIdsWithReports)->get(['name', 'email', 'student_id']);

        // Pass data to the view using compact
        return view('sub_admin.Sub_contentmoderation', compact('usersWithReports'));
    }
    public function subadmin_reportedContent_view($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return redirect('/subadmin/usermanagement');
        } else {
            // Retrieve user's reported posts
            $userPosts = Userpost::where('posted_by', $id)
                ->where('delete_post', '!=', 1)
                ->whereNotNull('reported_at')
                ->get();

            // Extract image paths from user posts
            $imagePathsArray = [];
            foreach ($userPosts as $post) {
            $attachments = explode("||", $post->attachment);
            foreach ($attachments as $attachment) {
                // Assuming each attachment is a file path
                $imagePathsArray[] = $attachment;
            }
        }
            // Pass user and their reported posts to the view
            return view('sub_admin.Sub_reportedContent_view', compact('user', 'userPosts','imagePathsArray'));

        }
    }
    public function subadmin_reportedContent_view_delete($id)
    {
        // Find the post by ID
        $post = Userpost::find($id);

        if ($post) {
            // Set the delete_post column to 1
            $post->delete_post = 1;
            $post->save();

            // Count the remaining posts for the user
            $remainingPostsCount = Userpost::where('posted_by', $post->posted_by)
                ->where('delete_post', '!=', 1)
                ->count();
                Notification::create([
                    'notified_to' => $post->posted_by,
                    'n_description' => 'Your post has been deleted by the admin. Please refrain from posting similar content in the future, as repeated violations may result in account suspension or banning',
                    'type' => 'post-deleted',
                    'url' => route('notifications'), // Adjust the URL as needed
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            // If there are no remaining posts for the user, redirect to the profileview page
            if ($remainingPostsCount === 0) {
                return redirect('/subadmin/reportedContent')->with('success', 'Post deleted successfully.');
            }

            // Redirect back to the profileview page
            return redirect()->back()->with('success', 'Post deleted successfully.');
        } else {
            // If post not found, redirect back with 
            return redirect()->back();
        }
    }
    public function subadmin_reportedContent_view_suspend($id)
    {
        $post = Userpost::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        // Set the delete_post column to 1
        $post->delete_post = 1;
        $post->save();

        // Suspend the user by setting ban_acc to 1
        $user = User::find($post->posted_by);
        if ($user) {
            $user->ban_acc = 1;
            $user->save();
            Notification::create([
                'notified_to' => $post->posted_by,
                'n_description' => 'Your account has been banned. It is currently under review by the super admin. Additionally, one of your posts has been deleted by the admin. Please contact support for further assistance ',
                'type' => 'suspend_ac',
                'url' => route('notifications'), // Adjust the URL as needed
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect('/subadmin/reportedContent')->with('success', 'User successfully suspended .');
    }
    public function subadmin_reportedContent_view_removeFromReport($id)
    {
        $post = Userpost::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        $post->reported_at = null;
        $post->check_report = true;
        $post->save();

        return redirect()->back();
    }
    // reported Content END!!

    // user verification START---
    public function sub_admin_verification()
    {
        $users = User::whereNull('verified_at')
            ->where('verification_document', '!=', 'reject')
            ->where('ban_acc', '=', '0')->latest('created_at')->get(); //checking the unverified user

        $data = compact('users');
        return view('sub_admin.sub_userverification')->with($data);
    }

    public function sub_admin_verification_view($id)
    {
        $user = User::find($id);
        if (is_null($user)) {

            return redirect('/subadmin/userverification');
        } else {
            //$unVerified_user=Customer::where('c_id', $id)->get();
            $data = compact('id', 'user');
            return view('sub_admin.sub_userverification_view')->with($data);
        }

    }
    public function sub_admin_verification_view_approve($id)
    {
        $user = User::find($id);
        if (is_null($user)) {

            return redirect('/subadmin/userverification');
        } else {
            $user->verified_at = Carbon::now();
            $user->save();
              // Send email notification to the user
        Mail::to($user->email)->send(new AccountVerifiedMail($user));

            Notification::create([
                'notified_to' => $user->student_id,
                'n_description' => 'We are pleased to inform you that your verification document has been approved by our admin team. You are now verified and can enjoy full access to all features of our platform.',
                'type' => 'verification_doc',
                'url' => route('notifications'), // Adjust the URL as needed
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return redirect('/subadmin/userverification')->with('message', 'Doocument is verified ! and an emails has been sent ');
        }
    }
    public function sub_admin_verification_view_reject($id)
    {
        $user = User::find($id);
        if (is_null($user)) {

            return redirect('/subadmin/userverification');
        } else {
            $user->verification_document = "reject";
            $user->verified_at = null;
            $user->save();
            // Send email notification to the user
        Mail::to($user->email)->send(new VerificationDocumentRejectedMail($user));
            Notification::create([
                'notified_to' => $user->student_id,
                'n_description' => 'We regret to inform you that your verification document has been rejected by our admin team. We kindly ask you to re-upload the document according to the provided guidelines.',
                'type' => 'verification_doc',
                'url' => route('notifications'), // Adjust the URL as needed
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return redirect('/subadmin/userverification')->with('message', 'Document is rejected ! and an email has been sent');
        }
    }
    //SUB admin user verification END---

    //User support START---
    public function subadmin_usersupport()
    {
        // Retrieve users who have at least one query and whose reply is null
        $users = Support::select('supports.student_id', 'users.name', 'users.email')
            ->join('users', 'supports.student_id', '=', 'users.student_id')
            ->whereNotNull('supports.query')
            ->whereNull('supports.reply')
            ->where('ban_acc', '=', '0')
            ->distinct()
            ->get();

        return view('sub_admin.Sub_userSupport', compact('users'));
    }
    public function subadmin_usersupport_view($id)
    {
        // Retrieve user's queries with null replies
        $queries = Support::where('student_id', $id)
            ->whereNotNull('query')
            ->whereNull('reply')
            ->get();

        return view('sub_admin.Sub_usersupport_view', compact('queries'));
    }


    // public function subadmin_usersupport_view_submit(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'id' => 'required|exists:supports,id', // Ensure the query ID exists in the supports table
    //         'reply' => 'required|string|max:255', // Validate the reply
    //     ]);

    //     // Find the support record by query ID
    //     $support = Support::find($validatedData['id']);

    //     if ($support) {

    //         $support->reply = $validatedData['reply'];
    //         $support->save();

    //         return redirect()->back()->with('success', 'Reply submitted successfully.');
    //     } else {
    //         // Redirect back with an error message if the support record is not found
    //         return redirect()->back()->with('error', 'Support record not found.');
    //     }
    // }

    public function subadmin_usersupport_view_submit(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:supports,id', // Ensure the query ID exists in the supports table
            'reply' => 'required|string|max:255', // Validate the reply
        ]);

        // Find the support record by query ID
        $support = Support::find($validatedData['id']);

        if ($support) {
            // Retrieve the query text from the support record
            $query = $support->query;

            $support->reply = $validatedData['reply'];
            $support->save();

            // Retrieve the user associated with the support
            $user = User::find($support->student_id);

            if ($user) {
                $email = $user->email;

                // Send email to the user with query and reply
                Mail::to($email)->send(new SupportReply($query, $validatedData['reply']));
                Notification::create([
                    'notified_to' => $user->student_id,
                    'n_description' => 'We wanted to inform you that a response has been provided to your recent query by our support team. Please check your email inbox for the detailed reply.',
                    'type' => 'support_reply',
                    'url' => route('notifications'), // Adjust the URL as needed
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
               
                // Delete the support record
                $support->delete();

                return redirect()->back()->with('success', 'Reply submitted successfully. An email has been sent.');
            } else {
                return redirect()->back()->with('error', 'User not found for the associated support.');
            }
        } else {
            // Redirect back with an error message if the support record is not found
            return redirect()->back()->with('error', 'Support record not found.');
        }
    }
    //User support END---

    public function subadmin_logout()
    {
        // Clear the user session
        Session::forget('sub_admin_logged_in');

        // Redirect the user to the login page or any other page
        return redirect('/subadmin');

    }
    //sub_admin Dashboard START---
    public function sub_admin_dashboard()
    {
        $userData = ['userInfo' => DB::table('admins')->where('email', session('sub_admin_logged_in'))->first()];
        //last 5 recent join user data
        $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        //count the total user from user table
        $totalUser = User::where('ban_acc', 0)->whereNotNull('verified_at')->count();

        //count the total posts from user_posts table
        $totalPost = Userpost::count();

        //count the total sub admin from admin table
        $totalBanUser = User::where('ban_acc', '1')->count();

        // Get the count of total pending query in support table
        $totalPendingQuery = Support::whereNull('reply')->count();
        $data = compact('totalUser', 'totalPost', 'totalBanUser', 'userData', 'recentUsers', 'totalPendingQuery');
        return view('sub_admin.Sub_dashboard')->with($data);
    }
    //sub_admin Dashboard END!!!
}
