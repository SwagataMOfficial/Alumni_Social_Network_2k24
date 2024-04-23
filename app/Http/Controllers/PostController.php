<?php

namespace App\Http\Controllers;

use App\Models\Userpost;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function addpost(Request $request) {
        $createArr = $request->all();

        if (array_key_exists('_token', $createArr)) {
            // Removing the resume from the associative array as it is not necessary in case of creating new post
            unset($createArr['_token']);
        }
        if (array_key_exists('post_image', $createArr)) {
            // Removing the posted image from the associative array as it is not necessary in case of creating new post, the value of this key will be the filename which is system generated
            unset($createArr['post_image']);
        }

        $file_arr = [];

        // Saving post automatically
        foreach ($request->file('post_image') as $index => $file) {

            $file_to_store = session()->get('user_id') . "/uploads/" . time() . '_' . $index . '.' . $file->getClientOriginalExtension();

            // storing individual post item
            $file->storeAs('/', $file_to_store, 'public');

            array_push($file_arr, $file_to_store);
        }

        $filename = implode("||", $file_arr);
        echo $filename;

        // adding the filename into the create array
        $createArr['attachment'] = $filename;
        $createArr['posted_by'] = session()->get('user_id');

        // echo "<pre>";
        // echo "create array: ";
        // print_r($createArr);
        // echo "</pre>";

        // TODO: save the filename into database and the file into the desired folder
        Userpost::create($createArr);
        return redirect(route('feed'));
    }

}
