<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function mark_read($id)
    {
        $noty = Notification::find($id);
        $noty->read_at = now();
        $res = $noty->save();
        if ($res) {
            return response()->json(['success' => 'true', 'notify_id' => $id]);
        } else {
            return response()->json(['success' => 'false', 'Error' => "Some Error Occured!"]);
        }
    }

    public function delete($id)
    {
        $noty = Notification::find($id);
        $res = $noty->delete();
        if ($res) {
            return response()->json(['success' => 'true', 'message' => "Notification deleted successfully!"], 200);
        } else {
            return response()->json(['success' => 'false', 'Error' => "Some Error Occured!"], 422);
        }
    }

    //check new notification
    public function checkNew()
    {
        // Get the user ID from the session
        $userId = session()->get('user_id');

        // Perform logic to check for new notifications for the current user
        $newNotifications = Notification::where('notified_to', $userId)
            ->whereNull('read_at')
            ->exists();

        // Return JSON response indicating whether there are new notifications
        return response()->json(['newNotifications' => $newNotifications]);
    }
}
