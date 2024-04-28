<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Userpost;
use Illuminate\Http\Request;

class ViewsController extends Controller {
    public function index() {
        $user = User::where("student_id", "=", session()->get('user_id'))->first();
        $posts = Userpost::where('posted_by', '!=', session()->get('user_id'))->where('visibility', '!=', '0')->where('post_type', '!=', 'job')->orderBy('created_at', 'desc')->limit(20)->get()->toArray();
        $data = compact("user", "posts");

        return view("feed")->with($data);
    }
    public function friends() {
        $p_requests = [
            [
                "name" => "Sk Md Altab",
                "bio" => "Student at Techno India Hooghly",
                "remember_token" => "d8cb02b991785b1b4166d9a8359fbcd6"
            ],
            [
                "name" => "Soumik Halder",
                "bio" => "Student at Techno India Hooghly",
                "remember_token" => "d8cb02b991785b1b4166d9a8359fbcd6"
            ]
        ];

        // getting own profile data
        $user = User::where("email", "=", session()->get('loggedInUser'))->first();

        // getting suggested people data
        $s_peoples = User::where("graduation_year", "=", $user->graduation_year)->where('student_id', '!=', session()->get('user_id'))->limit(20)->get();
        return view("friends")->with(compact('s_peoples', 'p_requests', 'user'));
    }
    public function messages() {
        return view("messages");
    }
    public function notifications() {
        $notifications = Notification::where('notified_to', '=', session()->get('user_id'))->get()->toArray();
        return view("notifications")->with(compact('notifications'));
    }
    public function view_settings() {
        return view('settings');
    }
}
