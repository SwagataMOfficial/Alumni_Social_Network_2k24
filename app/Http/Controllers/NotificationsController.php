<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller {
    public function mark_read($id) {
        $noty = Notification::find($id);
        $noty->read_at = now();
        $res = $noty->save();
        if ($res) {
            return response()->json(['success' => 'true', 'notify_id' => $id]);
        }
        else {
            return response()->json(['success' => 'false', 'Error' => "Some Error Occured!"]);
        }
    }

    public function delete($id){
        $noty = Notification::find($id);
        $res = $noty->delete();
        if ($res) {
            return response()->json(['success' => 'true', 'message' => "Notification deleted successfully!"], 200);
        }
        else {
            return response()->json(['success' => 'false', 'Error' => "Some Error Occured!"], 422);
        }
    }
}
