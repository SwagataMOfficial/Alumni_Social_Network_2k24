<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {
    public function send_message(Request $request) {
        $createMsgArr = $request->all();
        if (array_key_exists('_token', $createMsgArr)) {
            // Removing the _token from the associative array as it is not necessary in case of updating
            unset($createMsgArr['_token']);
        }

        if (array_key_exists('my_message', $createMsgArr)) {
            // message send event broadcast
            event(new \App\Events\Message(
                session()->get('user_id'),
                $request->input('my_message'),
            ));
        }
        else{
            event(new \App\Events\Message(
                session()->get('user_id'),
                $request->input('user_message'),
            ));
        }


        Message::create($createMsgArr);

        // return redirect()->back();
        return response()->json(['success' => true], 200);
    }
}
