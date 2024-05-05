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

            return response()->json(['success' => true, 'message' => 'Friend request accepted successfully'], 200);
        }
        else {
            return response()->json(['success' => true, 'message' => 'Failed to accept friend request'], 422);
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

            return response()->json(['success' => true, 'message' => 'Friend request is rejected successfully!'], 200);
        }
        else {
            return response()->json(['success' => false, 'message' => 'An error occured!'], 422);
        }
    }
    public function remove_friend($id) {

        $friendData = Friend::where('student_id', '=', $id)->where('friend_id', '=', session()->get('user_id'))->first();
        $myFriendData = Friend::where('student_id', '=', session()->get('user_id'))->where('friend_id', '=', $id)->first();

        // get both the user data and decrease the friend count by 1
        $me = User::find(session()->get('user_id'));
        $friend = User::find($id);

        if ($myFriendData->delete() && $friendData->delete()) {

            // get both the user data and decrease the friend count by 1
            $me = User::find(session()->get('user_id'));
            $friend = User::find($id);

            // decrementing the friend count
            $me->friends -= 1;
            $friend->friends -= 1;

            // saving the updated data
            $res1 = $me->save();
            $res2 = $friend->save();

            if ($res1 && $res2) {
                return response()->json(['success' => true, 'message' => 'Friend deleted successfully!'], 200);
            }
            else {
                return response()->json(['success' => false, 'message' => 'An error occured!'], 422);
            }
        }
        else {
            return response()->json(['success' => false, 'message' => 'Faild to delete friend!'], 422);
        }
    }
    public function send_request($token) {

        // checking if the requested user exists or not
        if (User::where('remember_token', '=', $token)->exists()) {
            $user = User::where('remember_token', '=', $token)->first();
            $me = session()->get('user_name');

            // getting the friend request data to check whether the friend request has been already sent and it is pending or not
            $is_sent = Friend::where('student_id', '=', session()->get('user_id'))->where('friend_id', '=', $user->student_id)->where('is_pending', '=', '1')->get();

            // if user has already sent a request to the same user then this if block will execute and it will return an error.
            if (!count($is_sent) == 0) {
                return response()->json(['success' => false, 'message' => 'Friend request is already sent!'], 422);
            }

            // checking whether the opposite user has sent me any friend request or not
            $is_received = Friend::where('student_id', '=', $user->student_id)->where('friend_id', '=', session()->get('user_id'))->where('is_pending', '=', '1')->get();
            if (!count($is_received) == 0) {
                return response()->json(['success' => false, 'message' => 'This user has already sent you friend request!'], 422);
            }
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
                return response()->json(['success' => true, 'message' => 'Friend request sent successfully'], 200);
            }
            else {
                return response()->json(['success' => false, 'message' => 'Faild to send friend request'], 422);
            }
        }
    }
}
