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
 
     public function subadmin_usermanagement()
     {
         return view('sub_admin.Sub_usermanagement');
     }
 
     public function subadmin_content()
     {
         return view('sub_admin.Sub_contentmoderation');
     }
 
     public function subadmin_profilesearch()
     {
         return view('sub_admin.Sub_profilesearch');
     }
 
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
 
 
     public function subadmin_profileview()
     {
         return view('sub_admin.Sub_profile_view');
     }
 
     public function subadmin_communication()
     {
         return view('sub_admin.Sub_communication');
     }
 
     public function subadmin_usersupport()
     {
         return view('sub_admin.Sub_userSupport');
     }
 
     public function subadmin_usersupport_view()
     {
         return view('sub_admin.Sub_usersupport_view');
     }
 
     public function subadmin_changepassword()
     {
         return view('sub_admin.Sub_changepassword');
     }
     public function subadmin_logout()
     {
         // Clear the user session
         Session::forget('sub_admin_logged_in');
 
         // Redirect the user to the login page or any other page
         return redirect('/subadmin');
 
     }
     public function sub_admin_dashboard()
     {
         $userData = ['userInfo' => DB::table('admins')->where('email', session('sub_admin_logged_in'))->first()];
         //last 5 recent join user data
         $recentUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        //count the total user from user table
         $totalUser = User::count();

        //count the total posts from user_posts table
         $totalPost = Userpost::count();

         //count the total sub admin from admin table
         $totalSubAdmin= Admin::where('admin_type', 'sub')->count();

         // Get the count of distinct users who have at least one reported content
         $totalReportedUsers = DB::table('user_posts')->whereNotNull('reported_at')->distinct()->count('posted_by');

         $data=compact('totalUser','totalPost','totalSubAdmin','userData','recentUsers','totalReportedUsers');
         return view('sub_admin.Sub_dashboard')->with($data);
     }
}
