<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Userpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


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

    public function usermanagement()
    {
        return view('super_admin.Usermanagement');
    }
    public function usermanagementview()
    {
        return view('super_admin.usermanagement_view');
    }
    public function content()
    {
        return view('super_admin.Contentmoderation');
    }
    public function admin_team()
    {
        return view('super_admin.team');
    }

    public function teamadd()
    {
        return view('super_admin.teamadd');
    }
    public function viewcontent()
    {
        return view('super_admin.viewcontent');
    }

    public function userban()
    {
        return view('super_admin.banneduser');
    }

    public function support()
    {
        return view('super_admin.support');
    }

    public function viewsupport()
    {
        return view('super_admin.viewsupport');
    }

    public function changepassword()
    {
        return view('super_admin.changepassword');
    }
    public function super_admin_dashboard()
    {
        $userData = ['userInfo' => DB::table('admins')->where('email', session('Super_admin_logged_in'))->first()];
        return view('super_admin.sup_admin_dashboard', $userData);
    }


     //________________super admin login request ajax___________________
     public function loginUser(Request $request)
     {
       
         $email = $request->input('super_admin_email');
         $password = $request->input('super_admin_password');
      
         $user = DB::table('admins')->where('email', $email)->first();
 
         if ($user && $user->password === $password) {
             // Authentication passed
             session(['Super_admin_logged_in' => $user->email]);
             return response()->json(['message' => 'Login successful'], 200);
         } else {
             // Authentication failed
             return response()->json(['errors' => ['identifier' => ['Invalid email or password.']]], 422);
         }
     }
        //sub admin login request ajaxx
    public function subloginUser(Request $request)
    {
      
        $email = $request->input('sub_admin_email');
        $password = $request->input('sub_admin_password');
     
        $user = DB::table('admins')->where('email', $email)->first();

        if ($user && $user->password === $password) {
            // Authentication passed
            session(['sub_admin_logged_in' => $user->email]);
            // // Retrieve the user's name
            // $userName = $user->name;
            // session(['sub_admin_name' => $userName]); // Storing name in session

            return response()->json(['message' => 'Login successful'], 200);
        } else {
            // Authentication failed
            return response()->json(['errors' => ['identifier' => ['Invalid email or password.']]], 422);
        }
    }
     // Sub Admin methods
     public function subadmin_team()
     {
         return view('sub_admin.Sub_team');
     }
 
     public function subadmin_teamadd()
     {
         return view('sub_admin.Sub_teamadd');
     }
     
     //user Management start---
    public function subadmin_usermanagement()
    {
        $users = User::where('ban_acc', 0)->get();

        $data=compact('users');
         return view('sub_admin.Sub_usermanagement')->with($data);
    }
    public function subadmin_profileview($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return redirect('/subadmin/usermanagement');
        } else {
            // Retrieve user's posts (including all types)
            $userPosts = UserPost::where('posted_by', $id)->where('delete_post', '!=', 1)->get();
            if($userPosts->isEmpty()) {
                return redirect()->back()->with('message', 'No posts found!');
            } else {
                // Pass user and their posts to the view
                $data = compact('user', 'userPosts');
                return view('sub_admin.Sub_profile_view')->with($data);
            }
        }
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
        $post = UserPost::find($id);
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
        } 
        else {
            // Retrieve user's reported posts
            $userPosts = UserPost::where('posted_by', $id)
                ->where('delete_post', '!=', 1)
                ->whereNotNull('reported_at')
                ->get();
        
            
            
                // Pass user and their reported posts to the view
                return view('sub_admin.Sub_reportedContent_view', compact('user', 'userPosts'));
            
        }
    }
    public function subadmin_reportedContent_view_delete($id){
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
    public function subadmin_reportedContent_view_suspend($id){
        $post = UserPost::find($id);
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
        }

        return redirect('/subadmin/reportedContent')->with('success', 'User successfully suspended .');
    }
    // reported Content END!!
 
    // user verification START---
    public function sub_admin_verification()
    {
    $users=User::whereNull('verified_at')->where('verification_document', '!=', 'reject')->latest('created_at')->get(); //checking the unverified user
    
    $data=compact('users');
        return view('sub_admin.sub_userverification')->with($data);
    }

    public function sub_admin_verification_view($id)
    {
    $user=User::find($id); 
    if(is_null($user)){
        
        return redirect('/subadmin/userverification');
    }
    else{
        //$unVerified_user=Customer::where('c_id', $id)->get();
        $data=compact('id','user');
        return view('sub_admin.sub_userverification_view')->with($data);
    }

    }
    public function sub_admin_verification_view_approve($id)
    {
    $user=User::find($id); 
    if(is_null($user)){
        
        return redirect('/subadmin/userverification');
    }
    else{
        $user->verified_at=Carbon::now();
        $user->save();

        return redirect('/subadmin/userverification')->with('message','Doocument is verified !');
    }
    }
    public function sub_admin_verification_view_reject($id)
    {
        $user=User::find($id); 
        if(is_null($user)){
            
            return redirect('/subadmin/userverification');
        }
        else{
            $user->verification_document = "reject";
            $user->verified_at=null;
            $user->save();

            return redirect('/subadmin/userverification')->with('message','Document is rejected !');
        }
    }
    //SUB admin user verification END---
 
 
    public function subadmin_usersupport()
     {
         return view('sub_admin.Sub_userSupport');
     }
 
     public function subadmin_usersupport_view()
     {
         return view('sub_admin.Sub_usersupport_view');
     }
 
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
        $totalUser = User::where('ban_acc', 0)->count();

        //count the total posts from user_posts table
         $totalPost = Userpost::count();

         //count the total sub admin from admin table
         $totalSubAdmin= Admin::where('admin_type', 'sub')->count();

         // Get the count of distinct users who have at least one reported content
         $totalReportedUsers = DB::table('user_posts')->whereNotNull('reported_at')->distinct()->count('posted_by');

         $data=compact('totalUser','totalPost','totalSubAdmin','userData','recentUsers','totalReportedUsers');
         return view('sub_admin.Sub_dashboard')->with($data);
     }
     //sub_admin Dashboard END!!!
}
