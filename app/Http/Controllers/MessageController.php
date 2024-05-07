<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {
    public function send_message(Request $request) {
        $createMsgArr = $request->all();
        if (array_key_exists('_token', $createMsgArr)) {
            // Removing the _token from the associative array as it is not necessary in case of updating
            unset($createMsgArr['_token']);
        }

        Message::create($createMsgArr);

        return redirect()->back();
    }
}
