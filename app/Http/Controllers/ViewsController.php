<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Notification;
use App\Models\User;
use App\Models\Userpost;
use Illuminate\Http\Request;

class ViewsController extends Controller {
    public function index() {
        $user = User::where("student_id", "=", session()->get('user_id'))->first();
        $posts = Userpost::where('posted_by', '!=', session()->get('user_id'))->where('visibility', '!=', '0')->where('post_type', '!=', 'job')->where('reported_at', '=', null)->orderBy('created_at', 'desc')->limit(20)->get()->toArray();

        $myid = session()->get('user_id');
        
        $suggested_people = User::leftJoin('friends', function ($join) use ($myid) {
            $join->on('users.student_id', '=', 'friends.student_id')->where('friends.friend_id', '=', $myid)->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')->whereNull('friends.friend_id')->where('users.student_id', '!=', $myid)->where("graduation_year", "=", $user->graduation_year)->select('users.*')->limit(6)->get();
        
        $data = compact("user", "posts", "suggested_people");

        return view("feed")->with($data);
    }
    public function friends() {
        $p_requests = Friend::where('friend_id', '=', session()->get('user_id'))->where('is_pending', '=', '1')->get()->toArray();

        // getting own profile data
        $user = User::where("email", "=", session()->get('loggedInUser'))->first();

        // getting suggested people data
        $id = session()->get('user_id');

        $s_peoples = User::leftJoin('friends', function ($join) use ($id) {
            $join->on('users.student_id', '=', 'friends.student_id')->where('friends.friend_id', '=', $id)->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')->whereNull('friends.friend_id')->where('users.student_id', '!=', $id)->where("graduation_year", "=", $user->graduation_year)->select('users.*')->limit(20)->get()->toArray();

        return view("friends")->with(compact('s_peoples', 'p_requests', 'user'));
    }
    public function view_myfriends() {
        $myid = session()->get('user_id');
        $mydata = User::find($myid);

        $myfriends = Friend::where('student_id', '=', session()->get('user_id'))->get()->toArray();

        $suggested_people = User::leftJoin('friends', function ($join) use ($myid) {
            $join->on('users.student_id', '=', 'friends.student_id')->where('friends.friend_id', '=', $myid)->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')->whereNull('friends.friend_id')->where('users.student_id', '!=', $myid)->where("graduation_year", "=", $mydata->graduation_year)->select('users.*')->limit(4)->get();
        
        $data = compact('suggested_people', 'myfriends');

        return view("myfriends")->with($data);
    }

    public function view_search(Request $request) {
        // TODO: uncomment this lines
        $search = $request->search;
        $user = User::where("name", "LIKE", "%$search%")->get()->toArray();
        // $data = compact("user");
        // return view("[add a view]")->with($data); 

        echo "Searching for: " . $request->search;
        echo "<h1>Result:</h1>";
        echo "<br>";
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }
    
    public function messages() {
        return view("messages");
    }
    public function notifications() {
        $notifications = Notification::where('notified_to', '=', session()->get('user_id'))->orderByDesc('created_at')->get()->toArray();
        return view("notifications")->with(compact('notifications'));
    }
    public function view_settings() {
        return view('settings');
    }
}
