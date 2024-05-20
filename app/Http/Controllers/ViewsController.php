<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Friend;
use App\Models\Message;
use App\Models\Notification;
use App\Models\User;
use App\Models\Userpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewsController extends Controller {
    public function index() {
        $user = User::where("student_id", "=", session()->get('user_id'))->first();
        $posts = Userpost::where('posted_by', '!=', session()->get('user_id'))->where('visibility', '!=', '0')->where('post_type', '!=', 'job')->where('reported_at', '=', null)->where('delete_post', '=', '0')->orderBy('created_at', 'desc')->limit(20)->get()->toArray();

        $myid = session()->get('user_id');

        $suggested_people = User::leftJoin('friends', function ($join) use ($myid) {
            $join->on('users.student_id', '=', 'friends.student_id')
                ->where('friends.friend_id', '=', $myid)
                ->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')
            ->whereNull('friends.friend_id')
            ->where('users.student_id', '!=', $myid)
            ->where("graduation_year", "=", $user->graduation_year)->where('profile_visibility', '=', '1')->where('ban_acc', '=', '0')->where('deleted_acc', '=', '0')->where('verified_at', '!=', null)->select('users.*')->limit(6)->get()->toArray();

        // shuffle($posts);
        shuffle($suggested_people);

        $data = compact("user", "posts", "suggested_people");

        return view("feed")->with($data);
    }

    public function jobs() {
        $user = User::where("student_id", "=", session()->get('user_id'))->first();

        $posts = Userpost::where('posted_by', '!=', session()->get('user_id'))->where('visibility', '!=', '0')->where('post_type', '=', 'job')->where('reported_at', '=', null)->where('delete_post', '=', '0')->orderBy('created_at', 'desc')->limit(20)->get()->toArray();

        $myid = session()->get('user_id');

        $suggested_people = User::leftJoin('friends', function ($join) use ($myid) {
            $join->on('users.student_id', '=', 'friends.student_id')
                ->where('friends.friend_id', '=', $myid)
                ->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')
            ->whereNull('friends.friend_id')
            ->where('users.student_id', '!=', $myid)
            ->where("graduation_year", "=", $user->graduation_year)->where('profile_visibility', '=', '1')->where('ban_acc', '=', '0')->where('deleted_acc', '=', '0')->where('verified_at', '!=', null)->select('users.*')->limit(6)->get()->toArray();

        // shuffle($posts);
        shuffle($suggested_people);

        $data = compact("user", "posts", "suggested_people");

        return view("jobs")->with($data);
    }

    public function friends() {
        $p_requests = Friend::where('friend_id', '=', session()->get('user_id'))->where('is_pending', '=', '1')->get()->toArray();

        // getting own profile data
        $user = User::where("email", "=", session()->get('loggedInUser'))->first();

        // getting suggested people data
        $id = session()->get('user_id');

        $s_peoples = User::leftJoin('friends', function ($join) use ($id) {
            $join->on('users.student_id', '=', 'friends.student_id')->where('friends.friend_id', '=', $id)->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')->whereNull('friends.friend_id')->where('users.student_id', '!=', $id)->where("graduation_year", "=", $user->graduation_year)->where('profile_visibility', '=', '1')->where('ban_acc', '=', '0')->where('deleted_acc', '=', '0')->where('verified_at', '!=', null)->select('users.*')->limit(20)->get()->toArray();

        shuffle($s_peoples);

        return view("friends")->with(compact('s_peoples', 'p_requests', 'user'));
    }
    public function view_myfriends() {
        $myid = session()->get('user_id');
        $mydata = User::find($myid);

        $myfriends = Friend::where('is_pending', '=', '0')->where('student_id', '=', session()->get('user_id'))->get()->toArray();

        $suggested_people = User::leftJoin('friends', function ($join) use ($myid) {
            $join->on('users.student_id', '=', 'friends.student_id')->where('friends.friend_id', '=', $myid)->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')->whereNull('friends.friend_id')->where('users.student_id', '!=', $myid)->where("graduation_year", "=", $mydata->graduation_year)->where('profile_visibility', '=', '1')->where('ban_acc', '=', '0')->where('deleted_acc', '=', '0')->where('verified_at', '!=', null)->select('users.*')->limit(4)->get()->toArray();

        shuffle($suggested_people);

        $data = compact('suggested_people', 'myfriends');

        return view("myfriends")->with($data);
    }

    public function messages($token = null) {

        // TODO: get the chats of the user

        if ($token != null) {

            // GETTING ALL THE USER'S DATA
            $user = User::where("remember_token", "=", $token)->first()->toArray();

            $user_id = session()->get('user_id');

            // get the chats [if the chat does not exist then create one]
            $chats = Chat::where(function ($query) use ($user, $user_id) {
                $query->where('chatted_by', $user_id)
                    ->where('chatted_to', $user['student_id']);
            })->orWhere(function ($query) use ($user, $user_id) {
                $query->where('chatted_by', $user['student_id'])
                    ->where('chatted_to', $user_id);
            })->get();

            // creating a new chat if the count of the chat variable is 0
            if (count($chats) == 0) {
                // CREATING A NEW CHAT
                Chat::create([
                    'chatted_by' => $user_id,
                    'chatted_to' => $user['student_id']
                ]);
            }

            $chats = Chat::where(function ($query) use ($user, $user_id) {
                $query->where('chatted_by', $user_id)
                    ->where('chatted_to', $user['student_id']);
            })->orWhere(function ($query) use ($user, $user_id) {
                $query->where('chatted_by', $user['student_id'])
                    ->where('chatted_to', $user_id);
            })->first()->toArray();

            $allchats = Friend::where('is_pending', '=', '0')->where('student_id', '=', session()->get('user_id'))->get()->toArray();

            // get the messages
            $data = compact('token', 'chats', 'allchats');
            return view("messages")->with($data);
        }
        else {
            $allchats = Friend::where('is_pending', '=', '0')->where('student_id', '=', session()->get('user_id'))->get()->toArray();

            $data = compact('token', 'allchats');
            return view("messages")->with($data);
        }
    }
    public function notifications() {
        $notifications = Notification::where('notified_to', '=', session()->get('user_id'))->orderByDesc('created_at')->get()->toArray();
        return view("notifications")->with(compact('notifications'));
    }
    public function view_settings() {
        return view('settings');
    }

    public function view_profiles($id) {

        // getting all the user data from users table
        $user = User::with('getFriends')->where("remember_token", "=", $id)->first();

        // getting suggested people data
        $myid = session()->get('user_id');
        $mydata = User::find($myid);

        $suggested_people = User::leftJoin('friends', function ($join) use ($myid) {
            $join->on('users.student_id', '=', 'friends.student_id')->where('friends.friend_id', '=', $myid)->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')->whereNull('friends.friend_id')->where('users.student_id', '!=', $myid)->where("graduation_year", "=", $mydata->graduation_year)->where('profile_visibility', '=', '1')->where('ban_acc', '=', '0')->where('deleted_acc', '=', '0')->where('verified_at', '!=', null)->select('users.*')->limit(4)->get()->toArray();

        // getting all the images posted by the user from the user_posts table and also filtering the non image posts
        $postedImages = Userpost::where('posted_by', '=', $user->student_id)->where('attachment', '!=', null)->where('delete_post', '=', '0')->get()->toArray();

        // getting all the posts of the user to display it in the profile page

        $posts = Userpost::where('posted_by', '=', $user->student_id)->where('post_type', '!=', 'job')->where('delete_post', '=', '0')->orderBy('created_at', 'desc')->get()->toArray();

        $jobs = Userpost::where('posted_by', '=', $user->student_id)->where('post_type', '=', 'job')->where('delete_post', '=', '0')->orderBy('created_at', 'desc')->get()->toArray();

        $friendStatus = Friend::where('student_id', '=', session()->get('user_id'))->where('friend_id', '=', $user['student_id'])->get()->toArray();

        // generating an array for the images only
        $imgArr = [];
        $am_i_the_users_friend = false;
        foreach ($user->toArray()['get_friends'] as $friend) {
            // filtering friend request cases
            if ($friend['is_pending'] != 1) {
                if ($friend['friend_id'] == session()->get('user_id')) {
                    $am_i_the_users_friend = true;
                }
            }
        }

        foreach ($postedImages as $img) {

            if ($img['visibility'] == 0) {
                if ($am_i_the_users_friend || $img['posted_by'] == session()->get('user_id')) {
                    // if multi post found then the below if-else block will run and prepare the array
                    if (strpos($img['attachment'], "||") != false) {
                        // for multiple images posts
                        foreach (explode("||", $img['attachment']) as $item) {
                            array_push($imgArr, $item);
                        }
                    }
                    else {
                        // for single image post
                        array_push($imgArr, $img['attachment']);
                    }
                }
            }
            else {

                // if multi post found then the below if-else block will run and prepare the array
                if (strpos($img['attachment'], "||") != false) {
                    // for multiple images posts
                    foreach (explode("||", $img['attachment']) as $item) {
                        array_push($imgArr, $item);
                    }
                }
                else {
                    // for single image post
                    array_push($imgArr, $img['attachment']);
                }
            }

        }

        shuffle($suggested_people);

        $data = compact("user", "imgArr", "posts", "suggested_people", "jobs", "friendStatus", "am_i_the_users_friend");
        return view('profiles')->with($data);
    }

    public function view_search(Request $request) {
        $search = trim($request->search);

        $myid = session()->get('user_id');
        $mydata = User::find($myid);

        $searchedData = User::with('getFriends', 'getAlterFriends')->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('student_id', 'LIKE', "%$search%");
        })->where('student_id', '!=', $myid)->where('verified_at', '!=', null)->where('ban_acc', '=', '0')->where('deleted_acc', '=', '0')->get()->toArray();

        $suggested_people = User::leftJoin('friends', function ($join) use ($myid) {
            $join->on('users.student_id', '=', 'friends.student_id')->where('friends.friend_id', '=', $myid)->orWhere('users.student_id', '=', 'friends.friend_id');
        })->whereNull('friends.student_id')->whereNull('friends.friend_id')->where('users.student_id', '!=', $myid)->where("graduation_year", "=", $mydata->graduation_year)->select('users.*')->where('profile_visibility', '=', '1')->where('ban_acc', '=', '0')->where('deleted_acc', '=', '0')->where('verified_at', '!=', null)->limit(4)->get()->toArray();

        shuffle($suggested_people);

        $user = $mydata->toArray();

        View::share('search', $search);
        $data = compact("searchedData", "suggested_people", "user");
        return view("searchedprofile")->with($data);
    }

    public function view_edit() {
        $user = User::where("student_id", '=', session()->get('user_id'))->first();
        return view('profile_edit')->with(compact('user'));
    }
}
