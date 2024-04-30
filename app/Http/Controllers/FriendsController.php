<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller {
    public function accept_friend($token, $id) {

        // validating the request
        if ((User::where('remember_token', '=', $token)->exists()) && (Friend::where('friend_id', '=', session()->get('user_id'))->exists())) {

            // getting the requested user's data
            $requestedUserData = User::where('remember_token', '=', $token)->first();

            // getting the request accepting user's data
            $mydata = User::where('student_id', '=', session()->get('user_id'))->first();

            // creating alternative friend list to signify both users are each others friends
            Friend::create([
                'student_id' => session()->get('user_id'),
                'friend_id' => "$requestedUserData->student_id",
                'is_pending' => '0',
                'accepted_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // creating a notification for the user that notifies that user has accepted the friend request
            Notification::create([
                'notified_to' => $requestedUserData->student_id,
                'n_description' => "$mydata->name has accepted your friend request",
                'type' => 'friend-request',
                'url' => route('myfriends'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // incrementing both the user's friend count
            $requestedUserData->friends += 1;
            $requestedUserData->save();

            $mydata->friends += 1;
            $mydata->save();

            // updating the friends table data
            $friend = Friend::find($id);
            $friend->accepted_at = now();
            $friend->is_pending = false;
            $friend->save();

            return redirect()->back();
        }
        else {
            // actual response
            // TODO: implement this feature
            // return redirect('/friends')->withErrors([
            //     'message' => 'Request is invalid!'
            // ]);
            return redirect('/friends');
        }
    }
    public function reject_request($token, $id) {

        // validating the request
        if ((User::where('remember_token', '=', $token)->exists()) && (Friend::where('id', '=', $id)->where('friend_id', '=', session()->get('user_id'))->exists())) {

            $user = User::where('remember_token', '=', $token)->first();
            $me = User::find(session()->get('user_id'));

            // creating a notification for the user that notifies that user has rejected the friend request
            Notification::create([
                'notified_to' => $user->student_id,
                'n_description' => "$me->name has rejected your friend request",
                'type' => 'friend-request',
                'url' => route('friends'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $friend = Friend::find($id);
            $friend->delete();

            return redirect()->back();
        }
        else {
            // actual response
            // TODO: implement this feature
            // return redirect('/friends')->withErrors([
            //     'message' => 'Request is invalid!'
            // ]);
            return redirect('/friends');
        }
    }
    public function remove_friend($id) {
        echo $id;

        $friendData = Friend::where('student_id', '=', $id)->where('friend_id', '=', session()->get('user_id'))->first();
        $myFriendData = Friend::where('student_id', '=', session()->get('user_id'))->where('friend_id', '=', $id)->first();

        if ($myFriendData->delete() && $friendData->delete()) {
            return redirect()->back();
        }
        else {
            return redirect('/friends');
        }
    }
    public function send_request($token) {

        // checking if the requested user exists or not
        if (User::where('remember_token', '=', $token)->exists()) {
            $user = User::where('remember_token', '=', $token)->first();
            $me = session()->get('user_name');

            // saving the request into the database
            $res = Friend::create([
                'student_id' => session()->get('user_id'),
                'friend_id' => "$user->student_id",
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // creating a notification for the user that notifies that a user has sent a friend request
            Notification::create([
                'notified_to' => $user->student_id,
                'n_description' => "$me has sent you a friend request",
                'type' => 'friend-request',
                'url' => route('friends'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            if ($res) {
                return redirect()->back();
            }
        }
    }
}
